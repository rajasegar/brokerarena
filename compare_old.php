<?php include 'header.php';?>
	<div id="content_wrap">
	    <div id="content" class="container_12 clearfix">
	        
	            <div class="grid_12">
	                <h1>Compare Brokers</h1>
					<?php
					$brokers = $_POST['chkCompare'];
					print_r($brokers);
					?>
					<div class="broker_list">
						<table class="comparison">
						<thead>
						<tr>
						<th>Parameters</th>
						<th>
						<img src="images/broker_logos/Angel-Broking-logo.jpg" alt="Angel broking" \>
						Angel Broking
						</th>
						<th>
						<img src="images/broker_logos/geojit.jpg" alt="Geojit" \>
						Geojit
						</th>
						<th>
						<img src="images/broker_logos/indiabulls.jpg" alt="IndiaBulls" \>
						IndiaBulls
						</th>
						<th>
						<img src="images/broker_logos/sharekhan-logo.jpg" alt="Sharekhan" \>
						Sharekhan
						</th>
						</tr>
						</thead>
						<tbody>
						<tr><td colspan="5" class="param_heading">Exchange Segment Memberships</td></tr>
						<tr>
						<td>NSE Equities</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>BSE Equities</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>NSE Derivatives</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>BSE Derivatives</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>NSE Currency Derivatives</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>USE Currency Derivatives</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>MCXSX Currency Derivatives</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>NSEL Commodity Spot Exchange</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>MCX Commodity Derivatives</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>NCDEX Commodity Derivatives</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>ICEX Commodity Derivatives</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>NMCE Commodity Derivatives</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>ACE Commodity Derivatives</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="param_heading">Products</td></tr>
						<tr>
						<td>Margin</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<td>Delivery</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<td>PTST</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<td>Margin Trade Funding</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<td>Stock Lending & Borrowing (Short Selling)</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<td>Margin with Stop Loss (High Leverage)</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<td>Online IPO</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<td>Online Mutual Funds</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<td>Online Bonds</td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="param_heading">Branches</td></tr>
						<tr>
						<td>No. of own Branches</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Own Branch List</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>No. of Franchisee Branches</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Franchisee Branch List</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="param_heading">Payment Gateways</td></tr>
						<tr>
						<td>List of Banks</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>List of Aggregators</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="param_heading">DP Gateways</td></tr>
						<tr>
						<td>Self POA Only</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>List of Depository Participants</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="param_heading">Mode of Account Opening</td></tr>
						<tr>
						<td>Door-step Service</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Walk-In</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="param_heading">Risk Management</td></tr>
						<tr>
						<td class="sub_param" colspan="5">Margin Limit</td>
						</tr>
						<tr>
						<td class="sub_param_value">Margin</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Delivery</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">PTST</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Margin Trade Funding</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Stock Lending & Borrowing (Short Selling)</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Margin with Stop Loss</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Mark to Market Limit</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Turn Over Limit</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Gross Exposure Limit</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Net Exposure Limit</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Net Buy Limit</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Net Sell Limit</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>MTM Auto Square-Off</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Timer Auto Square-Off</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="param_heading">Services</td></tr>
						<tr>
						<td>Offline Account</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td colspan="5" class="sub_param">Online Account</td>
						</tr>
						<tr>
						<td class="sub_param_value">EXE based Trading</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Browser based Trading</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Mobile based Trading</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Call N Trade</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<td colspan="5" class="sub_param">Trading</td>
						</tr>
						<tr>
						<td class="sub_param_value">After Market Orders</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Pre-Market Orders</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param1" colspan="5">Charting</td>
						</tr>
						<tr>
						<td class="sub_param1_value">Basic</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param1_value">Advanced (Technical Analysis)</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Greek Neutralizer</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Options Analysis</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Smart Order Routing</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Program Trading</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td colspan="5" class="sub_param">PMS</td>
						</tr>
						<tr>
						<td class="sub_param_value">Discretionary</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Non-Discretionary</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>IPO</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Mutual Fund</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Bonds</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Insurance</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Fixed Deposits</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Real Estate</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Advisory Services</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Forex</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="param_heading">Value Added Services</td></tr>
						<tr>
						<td class="sub_param" colspan="5">SMS Alerts</td>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on Order Confirmation</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on Order Modification</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">SMA on Order Cancellation</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on Trade Confirmation</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on MTM Breach</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on Ledger Update</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on Fund Transfer</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on IPO Bid Entry</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on IPO Bid Confirmation</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on MF Order Entry</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">SMS on MF Order Booking</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="sub_param">Research</td></tr>
						<tr>
						<td class="sub_param_value">Fundamental Research Reports</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Technical Research Reports</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="sub_param">SMS Query</td></tr>
						<tr>
						<td class="sub_param_value">Ledger Balance</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Orders</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Trades</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Net Position</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Portfolio Tracker</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="param_heading">Security</td></tr>
						<tr>
						<td>Two Factor Authentication</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>SSL Encryption</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="param_heading">Charges</td></tr>
						<tr>
						<td>Account Opening Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="sub_param">Annual Maintenance Charges</td></tr>
						<tr>
						<td class="sub_param_value">Annual</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Monthly</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="sub_param">Brokerage Charges</td></tr>
						<tr>
						<td class="sub_param_value">Margin</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Delivery</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">PTST</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Margin Trade Funding</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Stock Lending & Borrowing (Short Selling)</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Margin with Stop Loss</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Other Service Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="sub_param">DP Charges</td></tr>
						<tr>
						<td class="sub_param_value">Demat-In Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Demat-Out Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Inter-Settlement Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Re-Mat Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Off-Market Transaction Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">New DP Instruction Booklet Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td class="sub_param_value">Others</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>EXE Trading Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Browser Trading Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Mobile Trading Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Call N Trade Trading Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Account Closure Charges</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Program Trading</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="param_heading">Customer Centre</td></tr>
						<tr>
						<td>Dedicated Call Centre</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Toll-Free Number</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Average Response Time</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Client Satisfaction</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr><td colspan="5" class="param_heading">Awards</td></tr>
						<tr><td colspan="5" class="sub_param" >CNBC TV 18</td></tr>
						<tr>
						<td class="sub_param_value">Categories</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Economic Times</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Finance Asia</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Asia Money</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>CNBC Financial Advisor Awards</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Thomson Extel Surveys Awards</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Avaya Customer Responsiveness Awards</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Euromoney Award</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Primeranking Award</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Zee Business</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Outlook Money</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>CNBC Awaaz Consumer Award</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>The Wall Street Journal</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Global Finance</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						<tr>
						<td>Indian Banks Association</td>
						<td>10</td>
						<td><span class="no"></span></td>
						<td><span class="yes"></span></td>
						<td><span class="no"></span></td>
						</tr>
						</tbody>
						</table>
					</div>
					
				</div>
	        
	        
	    </div>
		<div class="clear"></div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript">
//define function to be executed on document ready
$(function(){

//turn specified element into an accordion
$("#myAccordion").accordion();

});
</script>