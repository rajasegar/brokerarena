<?php include 'header.php';?>
	<div class="container-fluid">
	    <div class="row-fluid">
			<div class="span3">
				<?php include 'admin_menu.php';?>
			</div>
	        <div class="span9">
				<h1>Manage Reviews</h1>
				<table class="table table-striped table-condensed">
				<tr><th>Broker</th><th>User</th><th>Topic</th><th>Date</th></tr>
				<?php
				$reviews = $db->select('tbl_brokerreviews');
				if($db->getnumRows() == 1) {
					echo "<tr>";
					echo "<td>".$userTools->getBrokerName($reviews['nBrokerID'])."</td>";
					echo "<td>".$reviews['sUserID']."</td>";
					echo "<td><a href='#' rel='popover' data-content='".$reviews['sReview']."' data-original-title='Description'>".extract_str($reviews['sTopic'],200)."</a></td>";
					echo "<td>".$reviews['dtCreated']."</td>";
					echo "</tr>";
				}
				else {
					foreach($reviews as $rev)
					{
						echo "<tr>";
						echo "<td>".$userTools->getBrokerName($rev['nBrokerID'])."</td>";
						echo "<td>".$rev['sUserID']."</td>";
						echo "<td><a href='#' rel='popover' data-content='".$rev['sReview']."' data-original-title='Description'>".extract_str($rev['sTopic'],200)."</a></td>";
						echo "<td>".$rev['dtCreated']."</td>";
						echo "</tr>";
					}
				}
				?>
				</table>
	        </div>
	    </div>
	</div>
	
<?php include 'footer.php';?>
