<?php
require('./includes/config.inc.php');

//redirect_invalid_user();
$_SESSION = array();
session_destroy();
setcookie (session_name(), '', time()-300);
require(MYSQL);

$page_title = 'Etude - Logout';

include('./includes/header.html');

include('./views/logout.html');

include('./includes/footer.html');

?>