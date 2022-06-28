<?php
include("./includes/config.inc.php");
require(MYSQL);

if(!isset($_SESSION['user_id'])) {
    $page_title = 'Etude - Cart';
    include('./includes/header.html');
    include('./views/no_user_cart.html');
    include('./includes/footer.html');
    exit();
}



if(isset($_GET['action']) && isset($_GET['type']) && isset($_GET['id'])){
    $action = $_GET['action'];
    $type = $_GET['type'];
    if ($type != '1' && $type != '2' && $type != '3') {
        $page_title = "Error!";
        include('./includes/header.html');
        include('./views/error.html');
        include('./includes/footer.html');
        exit();
    }
    $pid = $_GET['id'];
}

//do they want to do something?
if (isset($pid, $type, $_GET['action'])) {
        //check if the item is a real item
    if($type == 1 || $type == 2) {
        //query scores
        $q = "SELECT * FROM scores WHERE score_categories_id=" . $type 
        . " AND id=" . $pid;
        $r = mysqli_query($dbc, $q);
        //check if the product exists
        if (mysqli_num_rows($r) != 1) {
            $page_title = "Error!";
            include('./includes/header.html');
            include('./views/error.html');
            include('./includes/footer.html');
            exit();
        }
    } elseif($type == 3) {
        //query tutorials
        $q = "SELECT * FROM tutorials WHERE id=" . $pid;
        $r = mysqli_query($dbc, $q);
        //check if the product exists
        if (mysqli_num_rows($r) != 1) {
            $page_title = "Error!";
            include('./includes/header.html');
            include('./views/error.html');
            include('./includes/footer.html');
            exit();
        }
    } else {
        //unknown category
        $page_title = "Error!";
        include('./includes/header.html');
        include('./views/error.html');
        include('./includes/footer.html');
        exit();
    }


        //check if it's already in the cart
    $q = "SELECT * FROM carts WHERE user_session_id=" . $_SESSION['user_id']
    . " AND product_type=" . $type 
    . " AND product_id= " . $pid;
    $r = mysqli_query($dbc, $q);
        
    if (mysqli_num_rows($r) != 1) {
        //if there's no item add it to the cart
        if (isset($pid, $type, $_GET['action']) && ($_GET['action'] === 'add') ) { // Add a new product to the cart:

            $q = "INSERT into carts (user_session_id, product_type, product_id) VALUES (" . $_SESSION['user_id'] . ", " . $type . ", " . $pid . ")"; 
            $r =  mysqli_query($dbc, $q);
            if (mysqli_affected_rows($dbc) != 1) {
                $page_title = "Error!";
                include('./includes/header.html');
                include('./views/error.html');
                echo "A problem occured adding your item to your cart.";
                include('./includes/footer.html');
                exit();
            }
        } else {
            $page_title = "Error!";
            include('./includes/header.html');
            include('./views/error.html');
            echo "Unknown Action";
            include('./includes/footer.html');
            exit();
        }
    } elseif (mysqli_num_rows($r) != 0 && ($_GET['action'] === 'add')) {
        $page_title = 'Etude - Cart';

        include('./includes/header.html');
        echo CONT_START;
        echo "<div class='row'><div class='twelve columns'><p id='cart_alert'>That item is already in your cart!</p></div></div>";
        echo CONT_END;
        include('./views/view_cart.html');
        include('./includes/footer.html');
        exit();


    } elseif (isset($pid, $type, $_GET['action']) && ($_GET['action'] === 'remove') ) {

        
        $q = "DELETE FROM carts WHERE user_session_id=" . $_SESSION['user_id'] . " AND product_type=" . $type . " AND product_id=" . $pid . " LIMIT 1";
        $r =  mysqli_query($dbc, $q);
        

        
        if (mysqli_affected_rows($dbc) != 1) {
            $page_title = "Error!";
            include('./includes/header.html');
            include('./views/error.html');
            echo "<div class='row'><div class='twelve columns'><p id='cart_alert'>A problem occured removing your item from your cart.</p></div></div>";
            include('./includes/footer.html');
            exit();
            
        }
        
    }
}






    

$page_title = 'Etude - Cart';
    
include('./includes/header.html');
    
include('./views/view_cart.html');
    
include('./includes/footer.html');
    