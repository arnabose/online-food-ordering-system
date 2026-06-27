<?php
    session_start();
    if(!isset($_SESSION['admin_name'])){
        header('location: index.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>ADMIN PANEL | FOODIANS</title>
    <link rel="icon" href="../image/logo.png">

    <!-- bootstrap v5.2.0 css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--font cdn link-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- custom css link -->
    <link rel="stylesheet" type="text/css" href="../css/admin.css">

</head>
<body>
    <!-- navigation bar starts here -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../image/logo.png" alt="logo" width="32" height="25" class="d-inline-block align-text-top logo">FOODIANS:)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="dashboard.php">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="dashboard.php?category">CATEGORY</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="dashboard.php?items">FOOD ITEMS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="dashboard.php?order">ORDERS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="dashboard.php?review">REVIEWS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="dashboard.php?logout">LOG OUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
	<!-- navigation bar ends here -->

	<div class="admin-name">
		<p>Hello, <?php echo $_SESSION['admin_name'];?></p>
	</div>

    <div class="container">
        <?php
            if(isset($_GET['category'])){
                include 'category.php';
            }
            if(isset($_GET['items'])){
                include 'items.php';
            }
            if(isset($_GET['order'])){
                include 'order.php';
            }
            if(isset($_GET['review'])){
                include 'review.php';
            }
            if(isset($_GET['logout'])){
                include 'logout.php';
            }
            if(isset($_GET['category?add_category'])){
                include 'add_category.php';
            }
            if(isset($_GET['items?add_item'])){
                include 'add_item.php';
            }
        ?>      
    </div>
	
    <!-- bootstrap v5.2.0 js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
