<?php

// Are we live?

if (!defined('LIVE')) DEFINE('LIVE', false);



DEFINE('CONTACT_EMAIL', 'you@example.com');

DEFINE('BASE_URI', 'D:\\inetpub\\wwwroot\\LocalUser\\smjose\\WEB260\\EOS\\');
DEFINE('BASE_URL', 'wcet3.waketech.edu/smjose/WEB260/EOS/');
DEFINE('MYSQL', BASE_URI . 'includes\mysql.inc.php');




/*programming shortcuts*/
DEFINE('CONT_START', "<div class='container'>");
DEFINE('CONT_END', "</div>");

session_start();



/* ERROR HANDLER */
/*
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {
    $message = "An error occured in the script '$e_file' on line $e_line:\n$e_message\n";
    $message .= "<pre>" .print_r(debug_backtrace(), 1) . "</pre>\n";
    $message .= "<pre>" .print_r($e_vars, 1) . "</pre>\n";

    if (!LIVE) {
        echo '<div class="alert alert-danger">' . nl2br($message). '</div>';
    } else {
        //error_log($message, 1, CONTACT_EMAIL, 'From:admin@example.com');
        if ($e_number != E_NOTICE) {
            echo '<div class="alert alert-danger">A system error occured. We apologize for the inconvenience.</div>';
        }
    }
    return true;
}

set_error_handler('my_error_handler');


if (!headers_sent()) {

    function redirect_invalid_user($check = 'user_id', $destination = 'index.php', $protocol = 'http://') {
        if (!isset($_SESSION[$check])) { 
    
           $url = $protocol . BASE_URL . $destination; 
           header("Location: $url"); 
           exit(); 
        } 
     }

} else {

   include_once('./includes/header.html');
   trigger_error('You do not have permission to access this page. Please log in and try again.');
   include_once('./includes/footer.html');

} */