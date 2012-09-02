<?php include 'header.php';?>
	<div class="container-fluid">
	    <div class="row-fluid">
			<div class="span3">
				<?php include 'admin_menu.php';?>
			</div>
	        <div class="span9">
				<h1>Manage Users</h1>
				<table class="table table-striped">
				<tr><th>UserID</th><th>First Name</th><th>E-Mail</th><th>Created On</th><th>Active</th><th>Edit</th></tr>
				<?php
				$users = $db->select('tbl_usermaster');
				foreach($users as $user)
				{
					echo "<tr>";
					echo "<td>".$user['sUserName']."</td>";
					echo "<td>".$user['sFirstName']."</td>";
					echo "<td>".$user['sMailID']."</td>";
					echo "<td>".$user['dtCreated']."</td>";
					echo "<td>".yes_or_no($user['bActive'])."</td>";
					echo "<td>".$user['hybridauth_provider_name']."</td>";
					?>
					<td>
					<div class="btn-group">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						Edit
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href='update_user.php?id=<?php echo $user['sUserName'];?>' ><i class='icon icon-cog'></i> Edit</a></li>
							<li><a href='delete_user.php?id=<?php echo $user['sUserName'];?>' ><i class='icon icon-remove'></i> Delete</a></li>
						</ul>
					</div>
					</td>
					<?php
					echo "</tr>";
				}
				?>
				</table>
	        </div>
	    </div>
	</div>
	
<?php include 'footer.php';?>
