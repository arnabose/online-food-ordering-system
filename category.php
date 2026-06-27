<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> FOODIANS</title>
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
	<script>
		function message(){
			alert('Login to access your cart');
		}
	</script>

</head>

<body>
	
	<!--header part start-->
	<header class="fixed-top">
		<nav class="navbar navbar-expand-lg ">
		    <div class="container">
		        <a class="navbar-brand" href="#"><img src="image/logo.png" alt="logo" width="32" height="25">FOODIANS:)</a>
		        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		        </button>
		        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
		            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		                <li class="nav-item">
		                    <a class="nav-link" href="index.php">HOME</a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="index.php#dishes">CATEGORY</a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="index.php#about">ABOUT</a>
		                </li>
						<li class="nav-item">
		                    <a class="nav-link" href="index.php#menu">DISHES</a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="index.php#review">REVIEWS</a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" href="login.php">LOGIN</a>
		                </li>
		            </ul>
		            <ul class="navbar-nav ms-auto">
		                <div class="icons">
						<div class="icons">
					        <a href="login.php" class="fas fa-user" ></a>
					        <a onclick="message()" href="#" class="fas fa-shopping-cart"></a>
							<a href="index.php#footer" class="fa-solid fa-phone"></a>
		                </div>
		                </div>
		            </ul>
		    	</div>
		    </div>
		</nav>
	</header>
	<!-- header section ends-->


    <!----------------------------------dishes section starts here-------------------------->	
	<section style="margin-top:4%" class="menu" id="menu">
		<h3 class="sub-heading"> Our dishes </h3>
		<?php
            include 'connection/connection.php';
            $id= $_GET['id'];
			$select_query_category = "SELECT * from category where category_id = $id";
            $query_category = mysqli_query($con, $select_query_category);
			$data_category = mysqli_fetch_assoc($query_category);
			?>
			<h1 class="heading"><?php echo $data_category['category_name']?></h1>
			<div class="box-container">
				<?php			
                $select_query = "SELECT * from item where category_id = $id";
                $query = mysqli_query($con, $select_query);
    	        while($data = mysqli_fetch_assoc($query)){
					$image = $data['item_image'];
					$type= $data['item_type'];
					if($type=='veg'){ $colour = '#27ae60'; }
					else{ $colour = '#a52a2a'; }
    	            ?>
					<div class="box">
						<div class="image" style="height: 33rem;">
							<img src="<?php echo str_replace("../image","image",$image);?>" alt="category img">
							<a onclick="message()" href="#" class="fas fa-heart"></a>
		 				</div>
		 				<div class="content">
		 					<h3><?php echo $data['item_name'] ?></h3>
							<p style="font-weight: bold; color:<?php echo $colour;?>"><i><?php echo $type; ?></i></p>
							<div class="stars">
		 						<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star-half-alt"></i>
		 	     			</div>
		 					<p><?php echo $data['item_description'] ?></p>
							<span class="price">Rs.<?php echo $data['price'] ?><br></span>
		 					<a onclick="message()" herf="#" class="btn">add to cart</a>			
						</div>
					</div>
					<?php
				}
			?>
		</div>
	</section>
	<!----------------------------------dishes section ends here---------------------------->


    	<!--footer section starts-->
	<section class="footer">
		<div class="box-container">
			<div class="box">
				<h3>locations</h3>
					<a href="https://www.google.com/maps/place/Bankura">Bankura</a>
					<a href="https://www.google.com/maps/place/Kolkata">Kolkata</a>	
					<a href="https://www.google.com/maps/place/Durgapur">Durgapur</a>
					<a href="https://www.google.com/maps/place/Darjeeling">Darjeeling</a>
					<a href="https://www.google.com/maps/place/Raniganj">Raniganj</a>
			</div>
			<div class="box">
				<h3>quick links</h3>
					<a href="index.php">home</a>
					<a href="index.php#menu">dishes</a>	
					<a href="index.php#about">about</a>
					<a href="index.php#dishes">category</a>
					<a href="index.php#review">reviews</a>
					<a href="login.php">order</a>
			</div>
			<div class="box">
				<h3>contact information</h3>
					<a href="#review">+123-345-7860</a>
					<a href="#review">+111-222-3333</a>	
					<a href="mailto:ranabirgoswami@gmail.com">ranabirgoswami@gmail.com</a>
					<a href="mailto:arnabbose@gmail.com">arnabbose@gmail.com</a>
					<a href="mailto:rakeshdhibar@gmail.com">rakeshdhibar@gmail.com</a>
					<a href="#review">bankura,pin -722155</a>
			</div>
			<div class="box">
				<h3>follow us</h3>
					<a href="//www.facebook.com/login/">facebook</a>
					<a href="//www.twitter.com">twiter</a>	
					<a href="//www.instagram.com">instagram</a>
					<a href="//www.linkedin.com">linkedin</a>
			</div>
		</div>
		<div class="credit"> &copy; copyright 2022 Foodians. <span>All rights reserved.</span>
	</section>
	<!--footer section ends-->



	<!-- bootstrap v5.2.0 js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<!--swiper js file link -->
	<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
	<!-- custon js link -->
	<script src="./css/javascript.js"></script>
</body>
</html>
