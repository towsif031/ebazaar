<?php
    session_start();
    require_once "config/connect.php"; 

    if(isset($_POST) & !empty($_POST)){
        // $email = mysqli_real_escape_string($connection, $_POST['email']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $r = mysqli_fetch_assoc($result);

        if(password_verify($password, $r['password'])){
            //echo "User exits! Create a seesion.";
            $_SESSION['customer'] = $email;
            header('location: checkout.php');
        }else{
            // $fmsg = "Invalid login credentials!";
            header('location: login.php?message=1');
        }
    }
?>