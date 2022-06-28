<?php

require('./includes/config.inc.php');
require(MYSQL);
$page_title = 'Etude - Register';
include('./includes/header.html');

$reg_errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	// Check for a username:
	if (preg_match('/^[A-Z0-9]{2,45}$/i', $_POST['username'])) {
		$u = escape_data($_POST['username'], $dbc);
	} else {
		$reg_errors['username'] = 'Please enter a desired name using only letters and numbers!';
	}

	// Check for a password and match against the confirmed password:
	if (preg_match('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,}$/', $_POST['pass1']) ) {
		if ($_POST['pass1'] === $_POST['pass2']) {
			$p = $_POST['pass1'];
		} else {
			$reg_errors['pass2'] = 'Your password did not match the confirmed password!';
		}
	} else {
		$reg_errors['pass1'] = 'Please enter a valid password!';
	}
	
	if (empty($reg_errors)) { 

		$q = "SELECT username FROM users WHERE username='$u'";
		$r = mysqli_query($dbc, $q);
	
		$rows = mysqli_num_rows($r);
	
		if ($rows === 0) {
            
			$q = "INSERT INTO users (username, pass) VALUES ('$u', '"  .  password_hash($p, PASSWORD_BCRYPT) .  "')";

			$r = mysqli_query($dbc, $q);

			if (mysqli_affected_rows($dbc) === 1) { 

				$uid = mysqli_insert_id($dbc);
				$_SESSION['user_id']  = $uid;

                echo CONT_START; ?>

                <div class="row">
                    <div class="twelve columns">
                        <h3>Thanks for Registering!</h3>
                
                        <a href="./index.php" class="button">Home</a>
                    </div>
                </div>
                
                <?php echo CONT_END;
                ;

				include('./includes/footer.html'); 
				exit(); 
				
			} else {
				trigger_error('You could not be registered due to a system error. We apologize for any inconvenience. We will correct the error ASAP.');
			}
			
		} else {
			
			$row = mysqli_fetch_array($r, MYSQLI_NUM);
				
			$reg_errors['username'] = 'This username has already been registered. Please try another.';			
			
			
		} 
		
	}

}

require_once('./includes/form_functions.inc.php');
echo CONT_START;
?><h1>Register</h1>
<form action="register.php" method="post" accept-charset="utf-8">
<?php 
create_form_input('username', 'text', 'Username', $reg_errors); 
echo '<span class="help-block">Only letters and numbers are allowed.</span>';
create_form_input('pass1', 'password', 'Password', $reg_errors);
echo '<span class="help-block">Must be at least 6 characters long, with at least one lowercase letter, one uppercase letter, and one number.</span>';
create_form_input('pass2', 'password', 'Confirm Password', $reg_errors); 
?>
<div class="row">
	<div class="eight columns">&nbsp; </div>
	<div class="four columns">
		<input type="submit" name="submit_button" value="Next &rarr;" id="submit_button" class="btn btn-default" />
	</div>
</div>
</form>
<br>
<?php 
echo CONT_END;
include('./includes/footer.html');?>