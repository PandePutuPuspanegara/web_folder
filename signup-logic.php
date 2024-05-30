<?php
session_start();

require 'config/database.php';

//echo "hello";

//signupp//

if(isset($_POST['submit'])){
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];
    //var_dump($avatar);
   
    //echo $firstname, $lastname, $username , $email , $createpassword , $confirmpassword;

    //check

    if (!$firstname){
        $_SESSION['signup'] = "Please enter your first name";
    } elseif (!$lastname){
        $_SESSION['signup'] = "Please enter your last name";
    } elseif (!$username){
        $_SESSION['signup'] = "Please enter your username";
    } elseif (!$email){
        $_SESSION['signup'] = "Please enter valid email";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8 ){
        $_SESSION['signup'] = "Password should be at least 8 character";
    } elseif (!$avatar['name']){
        $_SESSION['signup'] = "please add avatar";
    } else {
        if ($createpassword !== $confirmpassword){
            $_SESSION['signup'] = "Password do not match";
        } else{
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);
            
            //check email

            $user_check_query = "SELECT * FROM users WHERE username= '$username' OR email = '$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result) > 0){
                $_SESSION['signup'] = "username or email already exist";
            }else{
                //rename avtar
                $time = time();
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                $allowed_files = ['png','jpg','jpeg'];
                $extention = explode('.',$avatar_name);
                $extention = end($extention);

                if(in_array($extention, $allowed_files)){
                    //make sure is not to large
                    if($avatar['size'] < 1000000){
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else{
                        $_SESSION['signup'] = "File is too big";
                    }
                
                }else {
                    $_SESSION['signup'] = "File should be png, jpg or jpeg";
                }
            }
        }
    }


    if(isset($_SESSION['signup'])){

        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    }else{
        $insert_user_query = "INSERT INTO users SET firstname='$firstname' , lastname = '$lastname', username = '$username' , email = '$email', password = '$hashed_password', avatar = '$avatar_name', is_admin = 0";

        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if(!mysqli_errno($connection)){
            $_SESSION['signup-success'] = "registration success please login";
            header(('location: ' . ROOT_URL .'signin.php'));
        }
    }

    //var_dump($avatar);
    
 
        
}else{
    header('location: ' . ROOT_URL. 'signup.php');
    die();
}

