<?php  
//User.class.php
require_once 'includes/global.inc.php';


class User
{
	public $m_ID;
	public $m_UserID;
	public $m_Password;
	public $m_MailID;
	public $m_joinDate;
	public $m_FirstName;
	public $m_LastName;
	public $m_PwdHint;
	public $m_PwdHintAnswer;
	public $m_ProfilePic;
	public $m_sAboutMe;
	
	
	//Constructor is called whenever a new object is created.
	// Takes an associative array with the DB row as an argument.
	function __construct($data)
	{
		$this->m_ID = (isset($data['nUserID'])) ? $data['nUserID'] : "";
		$this->m_UserID = (isset($data['sUserName'])) ? $data['sUserName'] : "";
		$this->m_MailID = (isset($data['sMailID'])) ? $data['sMailID'] : "";
		$this->m_FirstName = (isset($data['sFirstName'])) ? $data['sFirstName'] : "";
		$this->m_LastName = (isset($data['sLastName'])) ? $data['sLastName'] : "";

	}
	
	public function save($isNewUser = false)
	{
		// create a new database object.
		$db = new DB();
		
		// IF the user is already registered and we're
		// just updating their info.
		if(!$isNewUser)
		{
			//set the data array
			$data = array(
				"username" => "'$this->username'",
				"password" => "'$this->hashedPassword'",
				"email" => "'$this->email'"
			);
			
			// update the row in the database
			//$db->update($data,'tbl_UserMaster','id = '.$this->id);
		}
		else
		{
			// if the user is being registred for the first time.
			$data = array(
				"userid" => "'$this->m_UserID'",
				"password" => "'$this->m_Password'",
				"firstname" => "'$this->m_FirstName'",
				"lastname" => "'$this->m_LirstName'",
				"email"    => "'$this->m_MailID'",
				"pwdhint" => "'$this->m_PwdHint'",
				"hintanswer" => "'$this->m_PwdHintAnswer'",
			);
			
			//$db->callprocedure('stp_CreateUser',$data);
			$this->joinDate = time();
			$this->m_ProfilePic = "\\images\users\\User0000.jpg";
		}
		return true;
	}
	public function getUpdates()
	{
		$db = new DB();
		$where = "sUpdateTo in ('$this->m_UserID','ALL') order by nUpdateID desc";
		$result = $db->select('tbl_Updates',$where);
				
		
		echo "<ul>";
		foreach($result as $row)
		{
			$output = "<li><a href='user_profile.php?id=".$row['sUpdateTo'];
			$output .= "'> ".$row['sUpdateFrom']." </a>&nbsp;&nbsp;&nbsp;".$row['sMessage']."</li>";
			echo $output;
		}
		echo "</ul>";
		//mysql_free_result($result);
	}
	public function getTodoList()
	{
		$db = new DB();
		$low_priority = "images\\flag_white.gif";
		$normal_priority = "images\\flag_blue.gif";
		$high_priority = "images\\flag_red.gif";
		$status_pending = "images\\icon_ale.gif";
		$status_completed = "images\\checkmat.gif";
		
		
		$where = "sUserID = '$this->m_UserID' order by nID desc limit 5";
		$result = $db->select('tbl_TodoList',$where);
		
		
		
		echo "<table>";
		foreach($result as $row)
		{
			$output = "<tr>";
			if($row['nPriority'] == 0)
			{
				$output .= "<td><img src='".$low_priority."' alt='Low Priority'></td>";
			}
			else if($row['nPriority'] == 2)
			{
				$output .= "<td><img src='".$high_priority."' alt='High Priority'></td>";
			}
			else
			{
				$output .= "<td><img src='".$normal_priority."' alt='Normal Priority'></td>";
			}
			$output .= "<td>".$row['sTodoName']."</td>";
			if($row['nStatus'] == 0)
			{
				$output .= "<td><img src='".$status_pending."' alt='Pending'></td>";
			}
			else
			{
				$output .= "<td><img src='".$status_completed."' alt='Completed'></td>";
			}
			
			$output .= "</tr>";
			echo $output;
		}
		echo "</table>";
		
	}
	public function getCompleteTodoList()
	{
		$db = new DB();
		$low_priority = "images\\flag_white.gif";
		$normal_priority = "images\\flag_blue.gif";
		$high_priority = "images\\flag_red.gif";
		$status_pending = "images\\icon_ale.gif";
		$status_completed = "images\\checkmat.gif";
		
		$where = "sUserID = '$this->m_UserID' order by nID desc";
		$result = $db->select('tbl_TodoList',$where);
		
		echo "<ul id='todolist'>";
		foreach($result as $row)
		{
			$output = "<li class='ui-state-default ui-corner-all' id='".$row['nID']."'><span class='ui-icon ui-icon-grip-dotted-vertical'></span>";
			if($row['nPriority'] == 0)
			{
				$output .= "<img src='".$low_priority."' alt='Low Priority' width='16' height='16'/>&nbsp;&nbsp;";
			}
			else if($row['nPriority'] == 2)
			{
				$output .= "<img src='".$high_priority."' alt='High Priority' width='16' height='16'/>&nbsp;&nbsp;";
			}
			else
			{
				$output .= "<img src='".$normal_priority."' alt='Normal Priority' width='16' height='16'/>&nbsp;&nbsp;";
			}
			$output .= $row['sTodoName']."<span class='status_image'>";
			if($row['nStatus'] == 0)
			{
				$output .= "<img src='".$status_pending."' alt='Pending' title='Pending' align='right' />";
				$output .= "<input type='button' value='Done' class='button small green' onclick='completeTask(".$row['nID'].")'/>&nbsp;";
			}
			else
			{
				$output .= "<img src='".$status_completed."' alt='Completed' align='right'/>&nbsp;";
			}
			
			$output .= "</span></li>";
			echo $output;
                        
		}
		echo "</ul>";
	}
	public function loadTaskSheetPreferences()
	{
		$db = new DB();
		$where = "sUserID = '$this->m_UserID'";
		$results = $db->select('tbl_UserPreferences',$where);
		$this->m_DefaultView = $results['sDefaultView'];
		/*foreach($results as $row)
		{
			$this->m_DefaultView = $row['sDefaultView'];
		}*/
		
	}
	public function IsHavingPreferences()
	{
		global $db;
		$sql = "select fn_IsHavingPreferences(?)";
		$stmt = $db->prepare($sql);
		if($db->errno)
		{
			die($db->error);
		}
		$stmt->bind_param("s",$this->m_UserID);
		$stmt->execute();
		$stmt->bind_result($preference);
		$stmt->fetch();
		if($preference == 1)
			return true;
		else
			return false;
		
	}
	public function setDefaultPreferences()
	{
		global $db;
		$sql = "call stp_SetDefaultPreferences(?)";
		$stmt = $db->prepare($sql);
		
		$stmt->bind_param("s",$this->m_UserID);
		$stmt->execute();
	}
}
?>