<?php
    ob_start();
    session_start();
    require_once "config/connect.php";
    $uid = $_SESSION['customerid'];
    if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login.php');
    }

    if(isset($_GET['id']) & !empty($_GET['id'])){
        $pid = $_GET['id'];
        $sql = "INSERT INTO wishlist (pid, uid) VALUES ($pid, $uid)";
        $res = mysqli_query($connection, $sql);
        if($res){
            // header('location: wishlist.php');
            header("location: " . $_SERVER["HTTP_REFERER"]);    // stay in page while adding products into wishlist
        }
    }else{
        // header('location: wishlist.php');
        header("location: " . $_SERVER["HTTP_REFERER"]);
    }
?>