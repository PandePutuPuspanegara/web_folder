<?php
require 'config/database.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query ="DELETE FROM categories WHERE id=$id LIMIT 1";
    $result = mysqli_query($connection,$query);
    $_SESSION['delete-category-success'] = "category deleted";
}

header('location: ' . ROOT_URL . 'admin/manage-categories.php');
die();