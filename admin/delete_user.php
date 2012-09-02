<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
			<div class="span3">
				<?php include 'admin_menu.php';?>
			</div>
	        <div class="span9">
					<?php
					if(isset($_GET['id']))
					{
						$id = $_GET['id'];
						$where = "sUserName = '$id'";
						$result = $db->delete('tbl_usermaster',$where);
						//echo $result;
						if($result == true)
						{
							echo "<div class='alert alert-success'>User: <strong>$id</strong> successfully removed from the database.</div>";
						}
						else
						{
							echo "<div class='alert alert-error'>User: <strong>$id</strong> not available in the database.</div>";
						}
					}
					?>

	        </div>
	    </div>
	</div>
	
<?php include 'footer.php';?>
