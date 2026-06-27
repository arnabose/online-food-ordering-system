<?php
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('location: index.php');
    }
    include 'connection/connection.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>FOODIANS - <?php echo $_SESSION['user_name'];?></title>
    <link rel="icon" href="image/logo.png">

    <!-- bootstrap v5.2.0 css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- custom css link -->
    <link rel="stylesheet" type="text/css" href="./css/admin.css">

</head>
<div class="position">
    <div class="box">
        <h3 style="color: #192a56; font-weight: bolder;">review</h3>
        <form method="post" enctype="multipart/form-data">

            <?php
                //fetching data from database to show filled values
                $item_id = $_GET['id'];
                $user_id = $_SESSION['user_id'];

                $select_query_item = "select * from item where item_id= $item_id";
                $query_item = mysqli_query($con, $select_query_item);
                $data_item = mysqli_fetch_assoc($query_item);

            ?>
            <div class="mb-3 col-md-12" style="text-align: center;">
                <img src="<?php echo str_replace("../image","image",$data_item['item_image']);?>" style="height:94px; width:119px; border-radius: 8px;" >
            </div>
            <div class="mb-3 col-md-12" style="text-align: center;">
                <h5 style="color: #27ae60; font-weight: bold;"><?php echo $data_item['item_name']?></h5>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">write a review:</label>
                    <textarea  name="review" rows="3" cols="30" class="form-control" placeholder="your opinion"></textarea>
            </div>
            <div class="d-grid gap-2">    
                <button type="submit" name="submit" class="btn btn-primary">submit</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<!------ sending user review data to database ------->
<?php
    if(isset($_POST['submit'])){
        $item_id = $_GET['id'];
        $user_id = $_SESSION['user_id'];
        $review = $_POST['review'];

        $insert="INSERT INTO `reviews`(`user_id`, `item_id`, `review`) VALUES ('$user_id','$item_id','$review')";
        $query=mysqli_query($con,$insert);
        if($query){
            ?>
            <script>
                window.location.href="user_dashboard.php?order";
                alert('Thanks for your feedback');
            </script>
            <?php
        }else{
            ?>
            <script>
                window.location.href="user_dashboard.php?order";
                alert("Failed to send your review")
            </script>
            <?php
        }
    }
?>