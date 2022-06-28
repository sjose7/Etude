<?php
require('./includes/config.inc.php');
require(MYSQL);
$page_title = 'Etude - Browse Tutorials';
include('./includes/header.html');

echo CONT_START; 
echo '
<div class="row">
    <div class="twelve columns">
        <h1>Tutorials</h1>
    </div>
</div>';
$r = mysqli_query($dbc, "SELECT id, title, description, image FROM tutorials ORDER BY title");
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    echo "  
        <div class='row'>
            <div class='five columns'>
                <img src='./images/" . $row['image'] . "' width='100%' />
            </div>
            <div class='seven columns'>
                <p>
                    " . $row['title'] . "
                </p>
                <p>Description:</p>
                <p>" . $row['description'] . "</p>
                <a href='./cart.php?action=add&type=3&id=" . $row['id'] . "' class='button'>Add To Cart</a>
            </div>
        </div>
                
    ";
}
echo CONT_END;

include('./includes/footer.html');
?>