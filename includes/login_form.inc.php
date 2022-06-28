<?php
if(!isset($login_errors)) $login_errors = array();

require('./includes/form_functions.inc.php');

echo CONT_START; ?>
<form action="./login.php" method="post" accept-charset="utf-8">

<fieldset>

<legend>Login</legend>

<?php

if (array_key_exists('login', $login_errors)) {
    echo '<div class="alert alert-danger">' . $login_errors['login'] . '</div>';
}

create_form_input('user', 'user', '', $login_errors, array('placeholder'=>'Username'));
create_form_input('pass', 'password', '', $login_errors, array('placeholder'=>'Password'));

?>

<button type="submit" class="button">Login &rarr;</button>

</fieldset>

</form>
<?php echo CONT_END; ?>