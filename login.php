<?php
include("./includes/config.inc.php");
require(MYSQL);
$page_title = "Etude - Login";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('./includes/login.inc.php');
}
if(isset($_SESSION['user_id'])) {
    include('./includes/header.html');
    include('./views/logged_in.html');    
    include('./includes/footer.html');
}
include('./includes/header.html');
include('./includes/login_form.inc.php');

include('./includes/footer.html');

?>