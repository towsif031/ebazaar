<?php
    session_start();
    require_once "config/connect.php"; 

    if(isset($_POST) & !empty($_POST)){
        // $email = mysqli_real_escape_string($connection, $_POST['email']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        if($result){
            $_SESSION['customer'] = $email;
            header('location: checkout.php');
        }else{
            header('location: login.php?message=2');
        }
    }
?>