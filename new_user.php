<?php include 'header.php';?>
	<div class="container">
	    <div class="row">
	        <div class="span9">
	            <div class="well">
	                <h1>New User</h1>
					<h4>Start by completing the form below...</h4>
					<div id="ajax_err"></div>
					<form action="new_user_signup.php" method="post" onsubmit="return validateForm()">
	                <fieldset>
					<legend>Account Details</legend>
					<table>
					<tr><td colspan="2"><span class="hint">* All the fields are required.</span></td></tr>
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
					<td class="form_label">First Name:</td>
					<td><input type="text" name="txtFirstName" id="txtFirstName"/></td>
					</tr>
					<tr>
					<td class="form_label">Last Name:</td>
					<td><input type="text" name="txtLastName" id="txtLastName"/></td>
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
					<table>
					<tr>
					<td><input type="submit" value="Register" name="btnSubmit" class="btn btn-primary"/></td>
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
<script type="text/javascript" src="assets/js/new_user.js"></script>
