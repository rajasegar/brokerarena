<?php include 'header.php';?>
	<div class="container-fluid">
	    <div class="row-fluid">
			<div class="span3">
				<?php include 'admin_menu.php';?>
			</div>
	        <div class="span9">
				<h1>Manage Feedbacks</h1>
				<table class="table table-striped table-condensed">
				<tr><th>Name</th><th>E-Mail</th><th>Category</th><th>Remarks</th></tr>
				<?php
				$feedbacks = $db->select('tbl_feedbacks');
				if($db->getnumRows() == 1) {
					echo "<tr>";
					echo "<td>".$feedbacks['name']."</td>";
					echo "<td>".$feedbacks['email']."</td>";
					echo "<td>".$feedbacks['category']."</td>";
					echo "<td><a href='#' rel='popover' data-content='".$feedbacks['remarks']."' data-original-title='Description'>".extract_str($feedbacks['remarks'],200)."</a></td>";
					echo "</tr>";
				}
				else {
					if(is_array($feedbacks)) { // for zero recordset checking
						foreach($feedbacks as $fbk)
						{
							echo "<tr>";
							echo "<td>".$fbk['name']."</td>";
							echo "<td>".$fbk['email']."</td>";
							echo "<td>".$fbk['category']."</td>";
							echo "<td><a href='#' rel='popover' data-content='".$fbk['remarks']."' data-original-title='Description'>".extract_str($fbk['remarks'],200)."</a></td>";
							echo "</tr>";
						}
					}
				}
				?>
				</table>
	        </div>
	    </div>
	</div>
	
<?php include 'footer.php';?>
<script type="text/javascript">
	$('a[rel="popover"]').popover({placement:'bottom'});
</script>
