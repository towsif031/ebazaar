<?php
    session_start();
    // unset($_SESSION['cart']);    // to destroy single session variable
    // unset($_SESSION['customer']);
    session_destroy();  // to destroy all session variables
    header('location: login.php');
?>