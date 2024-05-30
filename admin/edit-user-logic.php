<?php
require 'config/database.php';

if (isset($_POST['submit'])){
    
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

    if(!$firstname || !$lastname){
        $_SESSION['edit-user'] = "invalid form input on edit page";
    } else{
        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', is_admin=$is_admin WHERE id=$id limit 1";
    
        $result = mysqli_query($connection, $query);

        if(mysqli_errno($connection)){
            $_SESSION['edit-user'] = "failed to update user";
        }else{
            $_SESSION['edit-user-success'] = "user $firstname updated successfully";
        }
    
    }

}

header('location: ' . ROOT_URL . 'admin/manage-users.php');
die();