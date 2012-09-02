<?php 

// server.php
//include required class for build nnusoap web service server
   require_once('lib/nusoap.php');
   include ('includes/global.inc.php');

  // Create server object
   $server = new soap_server();

   // configure  WSDL
   $server->configureWSDL('verify', 'urn:verifywsdl');

   // Register the method to expose
    $server->register('verify',                    // method
        array('user' => 'xsd:string','acct_type'=>'xsd:string'),                 // input parameters
        array('return' => 'xsd:string'),              // output parameters
        'urn:verifywsdl',                             // namespace
        'urn:verifywsdl#verify',                // soapaction
        'rpc',                                    // style
        'encoded',                              // use
        'Verify account type'            // documentation
    );

    // Define the method as a PHP function

    function verify($user,$acct_type) {
		$db_server = mysql_connect('rajasegar.db.6851221.hostedresource.com', 'rajasegar','Swetha143*');
		if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
		mysql_select_db('rajasegar')
		or die("Unable to select database: " . mysql_error());
		$query = "select * from tbl_licencemaster where md5(concat('Nemesi$13@ug1983',userid)) = '$user' and md5(concat('Nemesi$13@ug1983',type)) = '$acct_type'";
		$result = mysql_query($query); 
		if($result)
		{
			 if(mysql_num_rows($result) == 0)
		  {
			return "false";
		  }
		  else
		  {
			//return "true";
			$xml_output = "<?xml version=\"1.0\"?>
			<download>
			<accounttype>1</accounttype>
			<loginallowed>1</loginallowed>
			<licensetype>2</licensetype>
			<licenseactivationdate>20121210</licenseactivationdate>
			<maxdaysallowed>100</maxdaysallowed>
			<maxmessageallowed>100</maxmessageallowed>
			<messagesent>50</messagesent>
			</download>";
			
			
			$key = "Nemesi$13@ug1983";  
			$iv = "xMeSSenger12345*";  
			$keysize = 128;  
			  
			  
			$enced = mc_encrypt(stripslashes($xml_output), $key, $iv);  

			return $enced;
		  }
		}
		else
		  {
			return "false";
		  }
      
	 
	  //return "User = $user, AccountType = $acct_type";

    }
	
	
	// Register the method to expose
    $server->register('update_msgcount',                    // method
        array('user' => 'xsd:string','msg_count'=>'xsd:string'),                 // input parameters
        array('return' => 'xsd:string'),              // output parameters
        'urn:update_msgcountwsdl',                             // namespace
        'urn:update_msgcountwsdl#update_msgcount',                // soapaction
        'rpc',                                    // style
        'encoded',                              // use
        'Update Message count webservice'            // documentation
    );

    // Define the method as a PHP function

    function update_msgcount($user,$msg_count) {
		$update_fields = array(
			"msgs_sent" => "$msg_count");
		$where = "md5(concat('Nemesi$13@ug1983',user_id)) = '$user'";
		$result = $db->update($update_fields,"license_master",$where);
		if($result)
		{
			 if(mysql_num_rows($result) == 0)
		  {
			return "false";
		  }
		  else
		  {
			return "true";
			
		  }
		}
		else
		  {
			return "false";
		  }
		  
      
		

    }
 
  // Use the request to (try to) invoke the service
    $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
    $server->service($HTTP_RAW_POST_DATA); 
?>