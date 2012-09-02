<?php include 'header.php';?>
	<div class="container-fluid">
	    <div class="row-fluid">
			<div class="span3">
				<?php include 'admin_menu.php';?>
			</div>
	        <div class="span9">
				<h1>Manage Brokers</h1>
				<table class="table table-striped">
				<tr><th>Broker Name</th><th>Created On</th><th>Active</th><th>Edit</th><th>Parameters</th><th>Reviews</th></tr>
				<?php
				$brokers = $db->select('tbl_brokermaster');
				foreach($brokers as $broker)
				{
					echo "<tr>";
					echo "<td>".$broker['sBrokerName']."</td>";
					echo "<td>".$broker['dtCreated']."</td>";
					echo "<td>".yes_or_no($broker['bActive'])."</td>";
					?>
					<td>
					<div class="btn-group">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						Edit
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="update_broker.php?id=<?php echo $broker['nBrokerID'];?>">Update</a></li>
							<li><a href="delete_broker.php?id=<?php echo $broker['nBrokerID'];?>">Delete</a></li>
						</ul>
					</div>
					</td>
					<?php
					echo "<td><a class='btn' href='update_params.php?id=".$broker['nBrokerID']."' >Parameters</a></td>";
					?>
					<td>
					<div class="btn-group">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						Reviews
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="broker_review.php?id=<?php echo $broker['nBrokerID'];?>">View</a></li>
							<li><a href="update_reviews.php?id=<?php echo $broker['nBrokerID'];?>">Edit</a></li>
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
