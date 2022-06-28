<?php
include("./includes/config.inc.php");
include('./includes/header.html');
require(MYSQL);
if(isset($_SESSION['user_id'])) {
    $page_title = 'Etude - My Account';
    include('./views/myaccount.html');
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('./includes/login.inc.php');
    }
    include('./views/account.html');
}


include('./includes/footer.html');

