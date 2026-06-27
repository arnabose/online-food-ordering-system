<?php
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('location: index.php');
    }
    include 'connection/connection.php';
	$user_id = $_SESSION['user_id'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> FOODIANS - <?php echo $_SESSION['user_name'];?></title>
	<link rel="icon" href="image/logo.png">

	<!-- Swiper from CDN -->
	<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

	<!--font cdn link-->
	<link rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >

	<!-- bootstrap v5.2.0 css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<!--custom css file link -->
	<link rel ="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>
	
	<!----------------------------header part starts here-------------------------->
	<header class="fixed-top">
		<nav class="navbar navbar-expand-lg">
		    <div class="container">
		        <a class="navbar-brand" href="#"><img src="image/logo.png" alt="logo" width="32" height="25">FOODIANS:)</a>
		        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		        </button>
		        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
		            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		                <li class="nav-item">
		                    <a class="nav-link" href="user_dashboard.php?home">HOME</a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="user_dashboard.php?home#dishes">CATEGORY</a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="user_dashboard.php?home#about">ABOUT</a>
		                </li>
						<li class="nav-item">
		                    <a class="nav-link" href="user_dashboard.php?home#menu">DISHES</a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="user_dashboard.php?home#review">REVIEW</a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="user_dashboard.php?order">ORDERS</a>
		                </li>
		            </ul>
		            <ul class="navbar-nav ms-auto">
		                <div class="icons">
							<b class="nav-item dropdown">
          						<a class="fas fa-user" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
								<ul class= "dropdown-menu" aria-labelledby="navbarDropdown" style="background: #eee;">
									<h4 style="text-align: center; font-weight: bold">hello, <?php echo $_SESSION['user_name'];?></h4>
									<li><hr class="dropdown-divider"></li>
									<li class="dropdown-item"><a href="user_dashboard.php?view_reviews">My reviews</a></li>
           							<li class="dropdown-item"><a href="logout.php">Log out</a></li>          						
								</ul>
							</b>
                            <a href="user_dashboard.php?cart" class="fas fa-shopping-cart"> <?php count_cart();?></a>
                            <a href="user_dashboard.php?home#footer" class="fa-solid fa-phone"></a>
		                </div>
		            </ul>
		    	</div>
		    </div>
		</nav>
	</header>
	<!--------------------------- header section ends here------------------------->

	<!--------------- connection with another page content starts here ------------>
	<?php
		if(isset($_GET['home'])){
			include 'user_home.php';
		}
		if(isset($_GET['order'])){
			include 'user_orders.php';
		}
		if(isset($_GET['cart'])){
			include 'user_cart.php';
		}
		if(isset($_GET['view_reviews'])){
			include 'user_view_review.php';
		}
		if(isset($_GET['home?category'])){
			include 'user_category.php';
		}
	?>
	<!--------------- connection with another page content ends here -------------->


	
	<!-- bootstrap v5.2.0 js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<!--swiper js file link -->
	<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
	<!-- custon js link -->
	<script src="./css/javascript.js"></script>
</body>
</html>

<!------------------- function to disply number of items in cart ------------------->
<?php
    function count_cart(){
        global $con;
        $user_id = $_SESSION['user_id'];  
            
        $count_query_Cart= "select * from cart where user_id= $user_id";
        $count_cart=mysqli_query($con,$count_query_Cart);
        $count=mysqli_num_rows($count_cart);
		
        echo $count;
    }
?>