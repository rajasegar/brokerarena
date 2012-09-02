<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
	        <div class="span9">
	            <div class="well">
	                <h1>Add Your Brokerage Firm</h1>
					Your Brokerage listing gives you...
					<ul class="listing_benefits">
						<li><strong>Login access</strong> to update your listing</li>
						<li><strong>Review email alerts</strong>, sent when reviews are posted under your listing</li>
						<li><strong>Review commenting</strong>, allowing you to comment on any user review</li>
						<li><strong>Special offer promotion</strong> within your listing</li>
						<li><strong>A link to your site</strong> or account opening form</li>
						<li><strong>And much more...</strong></li>
					</ul>
					<h4>Start by completing the form below...</h4>
					<div id="ajax_err"></div>
					<form action="new_broker_signup.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
	                <fieldset>
					<legend>Account Details</legend>
					<table>
					<tr>
					<td class="form_label">User Name:</td>
					<td><input type="text" name="txtAccountUserName" id="txtAccountUserName"/><span id="info"></span></td>
					</tr>
					<tr>
					<td class="form_label">Password:</td>
					<td><input type="password" name="txtAccountPassword" id="txtAccountPassword"/></td>
					</tr>
					<tr>
					<td class="form_label">Confirm Password:</td>
					<td><input type="password" name="txtConfirmPassword" id="txtConfirmPassword"/></td>
					</tr>
					<tr>
					<td class="form_label">Email Address:</td>
					<td><input type="text" name="txtEmail" id="txtEmail"/></td>
					</tr>
					<tr>
					<td>Secret Question:</td>
					<td><input type="radio" name="radSecret" value="1" checked="checked"/>Select from below
					<input type="radio" name="radSecret" value="2" />My own question
					</td>
					</tr>
					<tr>
					<td class="form_label">Secret Question:</td>
					<td>
					<div id="defSecretQuestion">
					<select id="secquest" name="secret_question">
						<option value="--Select--" selected="selected">--Select--</option>
						<option value="Where did you spend your childhood summers?">Where did you spend your childhood summers?</option>
						<option value="What was the last name of your favorite teacher?">What was the last name of your favorite teacher?</option>
						<option value="What was the last name of your best childhood friend?">What was the last name of your best childhood friend?</option>
						<option value="What was your favorite food as a child?">What was your favorite food as a child?</option>
						<option value="What was the last name of your first boss?">What was the last name of your first boss?</option>
						<option value="What is the name of the hospital where you were born?">What is the name of the hospital where you were born?</option>
						<option value="What is your main frequent flier number?">What is your main frequent flier number?</option>
						<option value="What is the name of the street on which you grew up?">What is the name of the street on which you grew up?</option>
						<option value="What is the name of your favorite sports team?">What is the name of your favorite sports team?</option>
						<option value="What was the name of your first pet?">What was the name of your first pet?</option>
						<option value="What is the last name of your best man at your wedding?">What is the last name of your best man at your wedding?</option>
						<option value="What is the last name of your maid of honor at your wedding?">What is the last name of your maid of honor at your wedding?</option>
						<option value="What is the name of your favorite book?">What is the name of your favorite book?</option>
						<option value="What is the last name of your favorite musician?">What is the last name of your favorite musician?</option>
						<option value="Who is your all-time favorite movie character?">Who is your all-time favorite movie character?</option>
						<option value="What was the make of your first car?">What was the make of your first car?</option>
						<option value="What was the make of your first motorcycle?">What was the make of your first motorcycle?</option>
						<option value="Who is your favorite author?">Who is your favorite author?</option>
					</select>
					</div>
					<div id="customSecretQuestion">
					<input type="text" name="txtSecretQuestion" id="txtSecretQuestion" class="large_size"/>
					</div>
					</td>
					</tr>
					<tr>
					<td class="form_label">Answer:</td>
					<td><input		type="password" name="txtAnswer"		id="txtAnswer" /></td>
					</tr>
					</table>
					</fieldset>
					<fieldset>
					<legend>Company Details</legend>
					<table>
					<tr>
					<td class="form_label">Broker Name:</td>
					<td><input type="text" name="txtBrokerName" id="txtBrokerName" class="medium_size"/></td>
					</tr>
					<tr>
					<td class="form_label">Address:</td>
					<td><input type="text" name="txtAddress" id="txtAddress" class="large_size"/></td>
					</tr>
					<tr><td class="form_label">City:</td>
					<td><input type="text" name="txtCity" id="txtCity"/>
					</tr>
					<tr>
					<td class="form_label">State/Province:</td>
					<td><input type="text" name="txtState" id="txtState"/>
					</tr>
					<tr><td class="form_label">Zip/Postal Code:</td>
					<td><input type="text" maxlength="6" size="6" name="txtZip" id="txtZip" class="numeric_field"/>
					</tr>
					<tr><td class="form_label">Contact Number:</td>
					<td><input type="text"  maxlength="11" name="txtContactNo" id="txtContactNo" class="numeric_field"/>
					</tr>
					<tr><td class="form_label">Company URL:</td>
					<td><input type="text"  name="txtWebsite" id="txtWebsite" value="http://" />
					</tr>
					<tr><td class="form_label">Established:</td>
					<td><select size="1" name="month">
					  <option value="January">January</option>
					  <option value="February">February</option>
					  <option value="March">March</option>
					  <option value="April">April</option>
					  <option value="May">May</option>
					  <option value="June">June</option>
					  <option value="July">July</option>
					  <option value="August">August</option>
					  <option value="September">September</option>
					  <option value="October">October</option>
					  <option value="November">November</option>
					  <option value="December">December</option>
					</select> Year <input type="text" name="txtYear" id="txtYear" maxlength="4" size="4" class="numeric_field" /></td>
					</tr>
					<tr>
					<td class="form_label">Company Description:</td>
					<td><textarea rows="5" cols="50" name="txtDesc" id="txtDesc"></textarea></td>
					</tr>
					<tr>
					<td class="form_label">Company Logo: *</td>
					<td><input type="file" name="filelogo" id="filelogo" size="14" maxlength="32"/></td>
					</tr>
					<tr><td colspan="2" class="hints">
					* Your company logo must be:<br/>
					- saved in .gif or .jpg format<br/>
					- exactly 100 (width) x 100 (height) pixels in size<br/>
					- equal to or smaller then 10KB in size<br/>
					- Absolutely no animations <br/>
					</td>
					</tr>
					</table>
					</fieldset>
					<table>
					<tr>
					<td><input type="submit" value="Add Brokerage" name="btnSubmit" class="btn btn-primary"/></td>
					<td><input type="reset" value="Reset" name="btnReset" class="btn"/></td>
					</tr>
					</table>
					</form>
	            </div>
	        </div>
	        <div id="sidebar" class="span3">
	            <?php include 'sidebar.php';?>
	        </div>
	    </div>
	</div>
<?php include 'footer.php';?>
<script type="text/javascript" src="assets/js/new_broker.js"></script>
