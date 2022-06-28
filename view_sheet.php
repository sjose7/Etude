<?php
include("./includes/config.inc.php");
require(MYSQL);

$category = $_GET['category'];
$id = $_GET['sheet_id'];

$q = "SELECT title, composer, image FROM scores WHERE score_categories_id=" . $category . " AND id=" . $id;
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) !== 1) {

    $page_title = 'Error';
    include('./includes/header.html');
    echo CONT_START;
    include('./views/error.html');
    echo CONT_END;
    include('./includes/footer.html');
    exit();
 
}
$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

$page_title = "Etude - " . $row['title'];
include('./includes/header.html');
echo CONT_START;
echo ' 
<div class="row">
    <div class="twelve columns">
        <h2>' . $row["title"] . '</h2>
    </div>
</div>
<div class="row">

    <div class="five columns">
        <img src="./images/' . $row["image"] . '">
    </div>
    <div class="seven columns">
        <h3>' . $row["composer"] . '</h3>
        <p>
        <a href="./cart.php" class="button">Add To Cart</a> 
        </p>
    </div>
</div>
';
echo CONT_END;
include('./includes/footer.html');

?>