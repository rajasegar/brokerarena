<?php
include 'header.php';
if(isset($_POST['btnSubmit']))
{
	$sitename = sanitizeString($_POST['txtSiteName']);
	$siteurl = sanitizeString($_POST['txtSiteUrl']);
	$feedurl = sanitizeString($_POST['txtFeedUrl']);
	$insert_fields = array(
				"site_name" => "'$sitename'",
				"site_url" => "'$siteurl'",
				"feed_url" => "'$feedurl'",
				"type" => "0");
	$result = $db->insert($insert_fields,'news');
	if($result)
	{
	}
	else
	{
		$error = "News creation failed due to: ".$db->last_error;
	}
	
	
}

?>
	<div class="container-fluid">
	    <div class="row-fluid">
			<div class="span3">
	            <?php include 'admin_menu.php';?>
	        </div>
	        <div class="span9">
	            <div class="well">
					<?php
					if($result)
					{
						echo "<div class='msg_success'>News item successfully created.</div>";
					}
					else
					{
						if(isset($error))
						{
						echo "<div class='msg_error'>$error.</div>";
						}
					?>
	                <h1>Add News</h1>
					<form action="" method="post" onsubmit="return validateForm()">
	                <fieldset>
					<table>
					<tr><td colspan="2"><span class="hint">* All the fields are required.</span></td></tr>
					<tr>
					<td class="form_label">Site Name:</td>
					<td><input type="text" name="txtSiteName" id="txtSiteName"/></td>
					</tr>
					<tr>
					<td class="form_label">Site Url:</td>
					<td><input type="text" name="txtSiteUrl" id="txtSiteUrl"/></td>
					</tr>
					<tr>
					<td class="form_label">Feed Url:</td>
					<td><input type="text" name="txtFeedUrl" id="txtFeedUrl"/></td>
					</tr>
					<tr>
					</table>
					</fieldset>
					<table>
					<tr>
					<td><input type="submit" value="Register" name="btnSubmit" class="btn btn-primary"/></td>
					<td><input type="reset" value="Reset" name="btnReset" class="btn"/></td>
					</tr>
					</table>
					</form>
					<?php
					}
					?>
	            </div>
	        </div>
	        
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript" src="js/add_news_url.js"></script>
