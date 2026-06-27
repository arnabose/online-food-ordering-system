<?php
    session_start();
    include '../connection/connection.php';

    $id= $_GET['id'];
    // fetching category image name from database to delete the physical image in unlink section
    $select_query = "SELECT * from item where item_id = $id";
    $query = mysqli_query($con, $select_query);
    $data = mysqli_fetch_assoc($query);
    $image = $data['item_image'];

    // for deleting the selected category
    $delete_query = "delete from item where item_id= $id ";
    $query = mysqli_query($con, $delete_query);

    if($query){
        $_SESSION['i-status'] = "success";
        $_SESSION['i-message'] = "item Deleted successfully";
        ?>
        <script>
            window.location.href= "dashboard.php?items";
        </script>
        <?php
        unlink($image);
    }
    else{
        $_SESSION['i-status'] = "danger";
        $_SESSION['i-message'] = "Failed to delete item";
        ?>
        <script>
            window.location.href= "dashboard.php?items";
        </script>
        <?php
    }
?>