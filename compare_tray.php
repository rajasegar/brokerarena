<?php 
require_once 'includes/global.inc.php';
$brokers = array();
$count = 0;
// First try to get the list of brokers from url parameters
if((isset($_GET['b1'])) || (isset($_GET['b2'])) || (isset($_GET['b3'])) || (isset($_GET['b4']))) {
	if(isset($_GET['b1'])) {
		$broker = $userTools->getBroker($_GET['b1']);
		array_push($brokers,$broker);
	}
	if(isset($_GET['b2'])) {
		$broker = $userTools->getBroker($_GET['b2']);
		array_push($brokers,$broker);
	}
	if(isset($_GET['b3'])) {
		$broker = $userTools->getBroker($_GET['b3']);
		array_push($brokers,$broker);
	}
	if(isset($_GET['b4'])) {
		$broker = $userTools->getBroker($_GET['b4']);
		array_push($brokers,$broker);
	}
	foreach($brokers as $broker)
		{
			$broker->loadParams();
		}
}
else {
	if(isset($_SESSION['compare_tray'])) {
		$brokers = $_SESSION['compare_tray'];
	}
}
$count = count($brokers);
?>
<div class="container">
	<div class="row">
			
			<div id="compare_tray" class="span12">
			<i class="icon icon-chevron-up pull-right"></i>
			<div class="well">
					<p>
						<span class="h4">COMPARISON TRAY : <a class="btn" data-toggle="modal" href="#myModal">Add / Remove Brokers</a>
						You have selected <strong><?php echo $count;?></strong> Brokers to compare	<a href="compare.php" class="btn btn-primary"/>COMPARE</a>
					</p>
				<div id="brokers_list" class="row">
				<?php
					
					if(is_array($brokers)) {
					foreach($brokers as $brkr) {
						$items = "<div class='span3'><div class='alert'><a class='close' data-dismiss='alert' onclick='removefromTray($brkr->m_BrokerID)'>×</a><img src='$brkr->m_Logo' />";
						$items .= "</div></div>";
						echo $items;
					}
				}
				?>
				</div>
			</div><!-- .compare_tray -->
			</div>
	</div><!-- row -->
</div><!-- container -->
<!-- modal-->
<div class="modal hide" id="myModal">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Add / Remove Brokers</h3>
	</div>
	<div class="modal-body">
		<div class="span3">
			<form>
			<fieldset>
				<label for="txtBrokers">Select Brokers:</label>
				<?php
				$options = $db->select('tbl_brokermaster');
				foreach($options as $option)
				{
					echo '<label class="checkbox"><input type="checkbox" value="'.$option['nBrokerID'].'" > '.$option['sBrokerName'].'</label>';
				}
				?>
			</fieldset>
			</form>
		</div>
		<div class="span2">
			<h4>Selected Brokers:</h4>
			<?php
				
				if(is_array($brokers)) {
				foreach($brokers as $brkr) {
					$items = "<div class='alert'><a class='close' data-dismiss='alert' onclick='removefromTray($brkr->m_BrokerID)'>×</a>$brkr->m_BrokerName";
					$items .= "</div>";
					echo $items;
				}
			}
			?>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<a href="#" class="btn btn-primary">Save changes</a>
	</div>
</div>
