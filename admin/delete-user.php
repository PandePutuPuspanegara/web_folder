<?php
require 'config/database.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $qeury = "SELECT *FROM users WHERE id=$id";
    $result = mysqli_query($connection, $qeury);
    $user = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result)==1){
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' . $avatar_name;

        //delete ketika ada ditemukan

        if($avatar_path){
            unlink(($avatar_path));
        }
    }

    //delete all posts



    //delete user di database
    $delete_user_query = "DELETE FROM users WHERE id=$id";
    $delete_user_result = mysqli_query($connection,$delete_user_query);
    if(mysqli_errno($connection)){
        $_SESSION['delete-user'] = "couldn't delete {$user['firstname']} user";
    }else{
        $_SESSION['delete-user-success'] ="user {$user['firstname']} deleted";
    }
}

header('location: ' . ROOT_URL . 'admin/manage-users.php');
die();