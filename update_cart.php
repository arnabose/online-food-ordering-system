<?php
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('location: index.php');
    }
    include 'connection/connection.php';
    $item_id = $_GET['update'];
    $user_id = $_SESSION['user_id'];
    $qty = $_GET['quantity'];

    if(isset($_GET['update'])){
        $update_quantity = "UPDATE `cart` SET `user_id`='$user_id',`item_id`='$item_id',`quantity`='$qty' WHERE item_id = $item_id and user_id = $user_id";

        $uqery_update = mysqli_query($con, $update_quantity);
        if($uqery_update){
            ?>
            <script>
                window.location.href="user_dashboard.php?cart";
            </script>
            <?php
        }
        else{
            ?>
            <script>
                window.location.href="user_dashboard.php?cart";
                alert('failed to update quantity');
            </script>
            <?php
        }
    }
?>