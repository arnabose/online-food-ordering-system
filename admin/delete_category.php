<?php
    session_start();
    include '../connection/connection.php';

    $id= $_GET['id'];
    // fetching category image name from database to delete the physical image in unlink section
    $select_query = "SELECT * from category where category_id = $id";
    $query = mysqli_query($con, $select_query);
    $data = mysqli_fetch_assoc($query);
    $image = $data['category_image'];

    // for deleting the selected category
    $delete_query = "delete from category where category_id= $id ";
    $query = mysqli_query($con, $delete_query);
     
    if($query){
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Category Deleted successfully";
        header("location: dashboard.php?category");
        unlink($image);
    }
    else{
        $_SESSION['status'] = "danger";
        $_SESSION['message'] = "Failed to delete category";
        header('location: dashboard.php?category');
    }
?>
        