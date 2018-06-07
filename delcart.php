<?php
    session_start();
    if(isset($_GET['id']) & !empty($_GET['id'])){
        $id = $_GET['id'];
        unset($_SESSION['cart'][$id]);
        // header('location: cart.php');
        header("location: " . $_SERVER["HTTP_REFERER"]);    // stay in page while adding products into cart
    }
?>