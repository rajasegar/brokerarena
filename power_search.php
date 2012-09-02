<?php include 'header.php';?>
	<div class="container">
	    <div id="content" class="row">
	        <div class="span8">
				<h1>Power Search</h1>
				<div class="box2_fullwidth">
					<div id="ajax_err"></div>
					<form action="power_search_results.php" method="post">
						<fieldset>
							<table>
								<tr>
								<td class="form_label">Broker Name [or part of it]:</td>
								<td><input type="text" name="txtBrokerName" id="txtBrokerName"/></td>
								</tr>
							</table>
						</fieldset>
						<fieldset>
							<legend>Exchange Segment Memberships</legend>
							<table>
								<tr>
									<td class="form_label">Equities:</td>
									<td><input type="checkbox" name="chkNSEEq" />NSE
									<input type="checkbox" name="chkBSEEq" />BSE
									</td>
								</tr>
								<tr>
									<td class="form_label">Derivatives:</td>
									<td><input type="checkbox" name="chkNSEDerv" />NSE
									<input type="checkbox" name="chkBSEDerv" />BSE
									</td>
								</tr>
								<tr>
									<td class="form_label">Commodities:</td>
									<td><input type="checkbox" name="chkNSE" />NSEL Spot
									<input type="checkbox" name="chkBSE" />MCX
									<input type="checkbox" name="chkBSE" />NCDEX
									<input type="checkbox" name="chkBSE" />ICEX
									<input type="checkbox" name="chkBSE" />NMCE
									<input type="checkbox" name="chkBSE" />ACE
									</td>
								</tr>
								<tr>
									<td class="form_label">Currency:</td>
									<td><input type="checkbox" name="chkNSE" />NSE
									<input type="checkbox" name="chkBSE" />USE
									<input type="checkbox" name="chkBSE" />MCXSX
									</td>
								</tr>
							</table>
						</fieldset>
						<fieldset>
							<legend>Products</legend>
							<table>
								<tr>
									<td>
									<select id="lstProducts" name="lstProducts[]" multiple="multiple">
									<option value="ALL">[ALL]</option>
									<option value="Margin">Margin</option>
									<option value="Delivery">Delivery</option>
									<option value="PTST">PTST</option>
									<option value="MarginTradeFunding">Margin Trade Funding</option>
									<option value="ShortSelling">Short Selling</option>
									<option value="IPO">IPO</option>
									<option value="MF">Mutual Funds</option>
									<option value="Bonds">Bonds</option>
									</select>
									</td>
								</tr>
								
							</table>
						</fieldset>
						<fieldset>
							<legend>Account Opening Modes</legend>
							<table>
								<tr>
									<td>
									<select id="lstAcctOpenModes" multiple="multiple">
									<option value="ALL">[ALL]</option>
									<option value="DoorStep">Door step</option>
									<option value="WalkIn">Walk-In</option>
									</select>
									</td>
								</tr>
							</table>
						</fieldset>
						<input type="submit" class="btn btn-primary" value="Search" name="btnSubmit"/>
					</form>
				</div>
	        </div>
	        <div id="sidebar" class="span4">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
	
<?php include 'footer.php';?>
<script type="text/javascript">
$(document).ready(function() {
	$("#lstProducts").dropdownchecklist({icon: {}, firstItemChecksAll: true });
	$("#lstAcctOpenModes").dropdownchecklist({icon: {}, firstItemChecksAll: true });

});
</script>
