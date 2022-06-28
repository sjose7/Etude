<?php
include("./includes/config.inc.php");
$page_title = "Etude - Browse Sheetmusic";
include('./includes/header.html');
require(MYSQL);

if (isset($_GET['category'])) {

    $category = $_GET['category'];

    if ($category != '1' && $category != '2') {
        include('./views/nocategory.html');
    } else {
        include('./views/list_sheetmusic.html');
    }
} else {
include('./views/list_categories.html');
}
include('./includes/footer.html');

?>