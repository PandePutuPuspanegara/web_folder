<?php

require 'config/database.php';

if(isset($_POST['submit'])){

    $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password= filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$username_email){
    $_SESSION['signin'] = "enter username";

    } elseif(!$password){
        $_SESSION['signin'] = "enter password";
    } else{
        $fetch_user_query = "SELECT * FROM users WHERE username= '$username_email' OR email = '$username_email'";
        $fetch_user_result = mysqli_query($connection,$fetch_user_query);
    
        if(mysqli_num_rows($fetch_user_result)==1){
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];
            //compare password
            if(password_verify($password,$db_password)){
                //acc cntrl

                $_SESSION['user-id'] = $user_record['id'];

                //set session if admin

                if($user_record['is_admin']==1){
                    $_SESSION['user_is_admin'] = true;
                }

                header('location:' . ROOT_URL . 'admin/');
            }else{
                $_SESSION['signin'] = "input might be wrong";
            }

        } else{
            $_SESSION['signin'] = "password wrong or unmatch";
        }
    }

    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signin.php');
        die();
    }

} else{
    header('location: ' . ROOT_URL . 'signin.php');
    die();
} 