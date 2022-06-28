<?php
include('./includes/config.inc.php');
require(MYSQL);

$type = $_GET['type'];
$pid = $_GET['id'];
$q = "DELETE FROM carts WHERE user_session_id=" . $_SESSION['user_id'] . " AND product_type=" . $type . " AND product_id=" . $pid . " LIMIT 1";
$r =  mysqli_query($dbc, $q);
//$r = mysqli_query($dbc, $q);
//check if the product exists