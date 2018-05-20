<?php
    session_start();
    require_once "config/connect.php"; 

    if(isset($_POST) & !empty($_POST)){
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        $count = mysqli_num_rows($result);
        if($count == 1){
            //echo "User exits! Create a seesion.";
            $_SESSION['customer'] = $email;
            header('location: checkout.php');
        }else{
            // $fmsg = "Invalid login credentials!";
            header('location: login.php?message=1');
        }
    }
?>