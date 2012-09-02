<?php 
//UserTools.class.php
require_once 'User.class.php';
require_once 'Broker.class.php';
require_once 'DB.class.php';

class UserTools
{
	public $db;
	
	// Constructor
	// Takes the db object as an argument
	function __construct($db_obj)
	{
		$this->db = $db_obj;
	}
	
	// Log the user in. First checks to see if the
	// username and password match a row in the database.
	// if it is successful, set the session variables
	// and store the user object within.
	public function login_user($username,$password)
	{
		$where = "sUserName='$username' AND sPassword='$password' and bActive=1";
		$result = $this->db->select("tbl_usermaster",$where);
		
		//echo $result;
		if($this->db->getnumRows() ==1)
		{
			$_SESSION["user"] = serialize(new User($result));
			$_SESSION["login_time"]= time();
			$_SESSION["login_type"] = 1;
			return true;
		}
		else
		{
			return false;
		}
	}
	
	// Log the user using one of his social media profiles - Facebook, Twitter
	// If he is already in the database, then create a session for him otherwise
	// return false so that he can be added to the database
	public function social_signin($provider,$uid) {
		$where = "hybridauth_provider_name='$provider' AND hybridauth_provider_uid='$uid' and bActive=1";
		$result = $this->db->select("tbl_usermaster",$where);
		
		//echo $result;
		if($this->db->getnumRows() ==1)
		{
			$_SESSION["user"] = serialize(new User($result));
			$_SESSION["login_time"]= time();
			$_SESSION["login_type"] = 1;
			return true;
		}
		else
		{	// new to register the user in the database
			return false;
		}
	}
	
	// Register the user in the database using his
	// social media profile
	public function social_signup($user_info) {
		$inserted = $this->db->insert($user_info,'tbl_usermaster');
		if($inserted) {
			$user_obj = $this->getUserById($inserted);
			$_SESSION["user"] = serialize($user_obj);
			$_SESSION["login_time"]= time();
			$_SESSION["login_type"] = 1;
			return true;
		}
		else {
			return false;
		}
	}
	
	// Log the broker in. First checks to see if the
	// username and password match a row in the database.
	// if it is successful, set the session variables
	// and store the broker object within.
	public function login_broker($username,$password)
	{
		$where = "sUserName='$username' AND sPassword='$password'  and bActive=1";
		$result = $this->db->select("tbl_brokermaster",$where);
		
		//echo $result;
		if($this->db->getnumRows() ==1)
		{
			$_SESSION["user"] = serialize(new Broker($result,$this->db));
			$_SESSION["login_time"]= time();
			$_SESSION["login_type"] = 0;
			return true;
		}
		else
		{
			return false;
		}
	}
	
	// Log the admin in. First checks to see if the
	// username and password match a row in the database.
	// if it is successful, set the session variables
	// and store the broker object within.
	public function login_admin($username,$password)
	{
		$where = "userid='$username' AND password='$password'  and active=1";
		$result = $this->db->select("admin_master",$where);
		
		//echo $result;
		if($this->db->getnumRows() ==1)
		{
			$_SESSION["admin"] = serialize(new Admin($result,$this->db));
			$_SESSION["login_time"]= time();
			$_SESSION["login_type"] = 0;
			return true;
		}
		else
		{
			return false;
		}
	}
	
	// Activate the newly registered user and create default profiles
	public function activate_user($email,$conf_key)
	{
		$where1 = "email = '$email' and conf_code = '$conf_key'";
		$result = $this->db->select('confirm',$where1);
		if($result)
		{
			
			$userid = $result['userid'];
			$where2 = "sUserName = '$userid'";
			$update_fields = array("bActive" => "1");
			$this->db->update($update_fields, 'tbl_usermaster',$where2);
			$this->db->delete('confirm',$where1);
			return true;
		}
		else
		{
			return false;
			
		}
	}
	
	// Activate the newly registered broker and create default profiles
	public function activate_broker($email,$conf_key)
	{
		$where1 = "email = '$email' and conf_code = '$conf_key'";
		$result = $this->db->select('confirm',$where1);
		if($result)
		{
			
			$userid = $result['userid'];
			$where2 = "sUserName = '$userid'";
			$update_fields = array("bActive" => "1");
			$this->db->update($update_fields, 'tbl_brokermaster',$where2);
			//echo "Broker set to active.\r\n";
			$this->db->delete('confirm',$where1);
			//echo "Entry removed from confirm table.\r\n";
			
			// Also create default parameters for the broker
			//echo "Getting broker object...\r\n";
			$broker = $this->getBrokerbyName($userid);
			//echo "Broker object obtained.\r\n";
			//echo "Creating default parameters...\r\n";
			$broker->create_defParams();
			echo "Default parameters created...\r\n";
			return true;
		}
		else
		{
			return false;
			
		}
	}
	
	// Log the user out. Destroy the session variables.
	public function logout()
	{
		unset($_SESSION["user"]);
		unset($_SESSION["login_time"]);
		unset($_SESSION["logint_type"]);
		session_destroy();
	}
	
	// Log the admin out. Destroy the session variables.
	public function logout_admin()
	{
		unset($_SESSION["admin"]);
		unset($_SESSION["login_time"]);
		unset($_SESSION["logint_type"]);
		session_destroy();
	}
	
	// Check to see if a username exists.
	// This is called during registration to make user all user names are unique.
	public function checkUsernameExists($username)
	{
		$result = mysql_query("select sUserID from tbl_UserMaster where sUserID='$username'");
		if(mysql_num_rows($result) == 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	// get a user
	// returns a User object. Takes the users id as an input
	public function getUser($id)
	{
		$result = $this->db->select('tbl_usermaster',"sUserName = '$id'");
		return new User($result);
	}
	
	// get a user by his id
	// returns a User object. Takes the record id as an input
	public function getUserById($id)
	{
		$result = $this->db->select('tbl_usermaster',"nUserID = $id");
		return new User($result);
	}
	
	// get a broker by name
	// returns a Broker object. Takes the user name as an input
	public function getBrokerByName($id)
	{
		$result = $this->db->select('tbl_brokermaster',"sUserName = '$id'");
		return new Broker($result,$this->db);
	}
	
	// get a broker's id by name
	// returns a Broker ID. Takes the brokername as an input
	public function getBrokerIDByName($name)
	{
		$result = $this->db->select('tbl_brokermaster',"sBrokerName = '$name'");
		return $result['nBrokerID'];
	}
	
	
	// get a broker by id
	// returns a Broker object. Takes the broker id as an input
	public function getBroker($id)
	{
		$result = $this->db->select('tbl_brokermaster',"nBrokerID = $id");
		return new Broker($result,$this->db);
	}
	
	// get a broker name by id
	// returns a Broker name. Takes the broker id as an input
	public function getBrokerName($id)
	{
		$result = $this->db->select('tbl_brokermaster',"nBrokerID = $id");
		return $result['sBrokerName'];
	}
	
	//Function to get average ratings for a broker based on his ID
	public function getBrokerAvgRatings($id)
	{
		$cols = "sum(nRating)/count(nRating) as avg_rating";
		$result = $this->db->select('tbl_brokerratings',"nBrokerID = $id",$cols);
		if($result)
		{
				return draw_rating(round($result['avg_rating'],0));
		}
		else
		{
			return draw_rating(0);
		}
	}
	
	//Function to get the total no of reviews for a broker based on id
	public function getTotalReviews($id)
	{
		$cols = "count(*) as total_reviews";
		$result = $this->db->select('tbl_brokerreviews',"nBrokerID = $id",$cols);
		if($result)
		{
				return $result['total_reviews'];
		}
		else
		{
			return "0";
		}
	}
	
	//Function to get the total no of ratings for a broker based on id
	public function getTotalRatings($id)
	{
		$cols = "count(*) as total_ratings";
		$result = $this->db->select('tbl_brokerratings',"nBrokerID = $id",$cols);
		if($result)
		{
				return $result['total_ratings'];
		}
		else
		{
			return "0";
		}
	}
	
	// Function to render the broker details for each broker in the brokers.php page
	public function renderBroker($broker) {
		$broker_id = $broker['nBrokerID'];
		$html = '<div class="row">';
		$html .= '<div class="span2">';
		$html .= "<a href=\"broker_info.php?id=$broker_id\">";
		$html .= "<img src='".$broker['sLogoImage']."' alt='".$broker['sBrokerName']."' /></a>";
		$html .= "<fieldset><label class='checkbox'><input type=\"checkbox\" class=\"compare\" name=\"chkCompare[]\" value=\"$broker_id\" /> Compare</label></fieldset></div>";
		$html .= '<div class="span6">';
		$html .= "<h3><a href=\"broker_info.php?id=$broker_id\">".$broker['sBrokerName']."</a></h3>";
		$html .= "<span class=\"website\"><i class=\"icon icon-home\"></i><a href='".$broker['sWebsite']."'>Website</a></span>";
		$html .= "<p class=\"desc\">".extract_str($broker['sDescription'],250)."</p>";
		$html .= "<span>Ratings: ";
		$html .= $this->getBrokerAvgRatings($broker_id);
		$html .= "<a href=\"broker_info.php?id=$broker_id#divRatings\"> <span class=\"badge badge-inverse\">";
		$html .= $this->getTotalRatings($broker_id);
		$html .= "</span></a></span>";
		$html .= "<span> Reviews:  <i class=\"icon icon-comment\"></i>  <a href=\"broker_info.php?id=$broker_id#divReviews\"><span class=\"badge badge-inverse\">";
		$html .= $this->getTotalReviews($broker_id);
		$html .= "</span></a></span> <span class=\"pull-right\">";
		$html .= "<a href=\"broker_info.php?id=$broker_id\" class=\"btn\">Find out more</a>";
		$html .= "</span></div></div>";
		return $html;
	}
	
	// Function to render the broker review for each broker in the reviews.php page
	public function renderBrokerReview($broker) {
		$broker_id = $broker['nBrokerID'];
		$html = '<div class="row">';
		$html .= '<div class="span2">';
		$html .= "<a href=\"broker_review.php?id=$broker_id\">";
		$html .= "<img src='".$broker['sLogoImage']."' alt='".$broker['sBrokerName']."' /></a>";
		$html .= "</div>";
		$html .= '<div class="span6">';
		$html .= "<h3><a href=\"broker_review.php?id=$broker_id\">".$broker['sBrokerName']."</a></h3>";
		$html .= "<p class=\"desc\">".extract_str($broker['sDescription'],250)."</p>";
		$html .= $this->getBrokerAvgRatings($broker_id);
		$html .= "<span class=\"ratings\"> <a href=\"broker_info.php?id=$broker_id#divRatings\"><span class=\"label\">";
		$html .= $this->getTotalRatings($broker_id);
		$html .= "</span></a></span>";
		$html .= "<span class=\"pull-right\">";
		$html .= "<a href=\"broker_review.php?id=$broker_id\" class=\"btn\">Complete Review</a>";
		$html .= "</span></div></div>";
		return $html;
	}
	
	//Function to get the total no of users
	public function getTotalUsers()
	{
		$cols = "count(*) as total_users";
		$result = $this->db->select('tbl_usermaster',"1 = 1",$cols);
		if($result)
		{
				return $result['total_users'];
		}
		else
		{
			return "0";
		}
	}
	
	//Function to get the total no of brokers
	public function getTotalBrokers()
	{
		$cols = "count(*) as total_brokers";
		$result = $this->db->select('tbl_brokermaster',"1 = 1",$cols);
		if($result)
		{
				return $result['total_brokers'];
		}
		else
		{
			return "0";
		}
	}
	
	//Function to get the total no of reviews
	public function getReviewsCount()
	{
		$cols = "count(*) as total_reviews";
		$result = $this->db->select('tbl_brokerreviews',"1=1",$cols);
		if($result)
		{
				return $result['total_reviews'];
		}
		else
		{
			return "0";
		}
	}
	
	//Function to get the total no of ratings
	public function getRatingsCount()
	{
		$cols = "count(*) as total_ratings";
		$result = $this->db->select('tbl_brokerratings',"1=1",$cols);
		if($result)
		{
				return $result['total_ratings'];
		}
		else
		{
			return "0";
		}
	}
	
	
	//Function to get the brokermeter
	public function renderBrokerMeter() {
		$sql = "SELECT sBrokerName, sum(nRating)/count(nRating) FROM tbl_brokermaster,tbl_brokerratings 
				where tbl_brokermaster.nBrokerID = tbl_brokerratings.nBrokerID
				group by tbl_brokerratings.nBrokerID 
				order by sum(nRating)/count(nRating) desc
				limit 0,10";
		$result = $this->db->execute($sql);
		$i=1;
		foreach($result as $broker) {
			echo "<tr><td>$i</td><td> <i class='icon icon-arrow-up'></i></td><td>".$broker['sBrokerName']."</td></tr>";
			$i++;
		}
	}
	
	
}
?>
