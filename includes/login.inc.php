<?php


$login_errors = array();

if (!empty($_POST['user'])) {
	$u = escape_data($_POST['user'], $dbc);
} else {
    $login_errors['user'] = 'Please enter a Username!';
}

if (!empty($_POST['pass'])) {
    $p = $_POST['pass'];
} else {
    $login_errors['pass'] = 'Please enter your password!';
}

if (empty($login_errors)) {
    $q = "SELECT id, username, pass FROM users WHERE username='$u'";
    $r = mysqli_query($dbc, $q);
    
    if (mysqli_num_rows($r) === 1) {
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);

        if (password_verify($p, $row['pass'])) {
            
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

        } else {
            $login_errors['login'] = 'The username and password do not match those on file.';        
        }
    } else {
        $login_errors['login'] = 'The username and password do not match those on file.';
    }


}

//end $login_errors