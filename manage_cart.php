<?php
    include 'connection/connection.php';
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('location: index.php');
    }

    // logic for adding items to cart
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
     
    $select_query_cart = "select * from cart where item_id= $item_id and user_id= $user_id";
    $query_cart = mysqli_query($con, $select_query_cart);
    $count=mysqli_num_rows($query_cart);

    if(empty($data = mysqli_fetch_assoc($query_cart))){
        $insert_query_cart = "insert into cart(user_id,item_id,quantity) values ('$user_id','$item_id',1)";
        $query_cart_insert = mysqli_query($con,$insert_query_cart);
        if($query_cart_insert){
            ?>
            <script>
                alert('Item added your cart');
                window.location.href="user_dashboard.php?home#menu";
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert('Failed to add item in your cart');
                window.location.href="user_dashboard.php?home#menu";
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            alert('Item already exists to your cart');
            window.location.href="user_dashboard.php?home#menu";
        </script>
        <?php
    }
?>
