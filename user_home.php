	<!------------------------------ home section starts here ----------------------------->
	<form></form> 
	<section class="home" id="home">
		<div class="swiper mySwiper home-slider">
			<div class="swiper-wrapper swiper-slide wrapper">
				<div class="swiper-slide slide">
					<div class="content">
						<span>Our Special Dish</span>
						<h3>Mixed ingredient tasty pizza</h3>
						<p>Tomato,Corn,Grilled Mushroom,Capsicum ,Onion and Cheese for that lipsmacking taste.</p>
						<a href="user_dashboard.php?home?category&id=2" class="btn">Order Now</a>
					</div>
					<div class="image">
						<img src="image/piz2.jpg" alt="">
					</div>
				</div>
				<div class="swiper-slide slide">
					<div class="content">
						<span>Our Special Dish</span>
						<h3>Special delicious-chicken Burger</h3>
						<p>Tender and juicy chicken patty coated in spicy,crispy batter topped with a tomato sauce will have you craving for more.</p>
						<a href="user_dashboard.php?home?category&id=1" class="btn">Order Now</a>
    				</div>
					<div class="image">
						<img src="image/bur1.jpg" alt="">
					</div>
				</div>
				<div class="swiper-slide slide">
					<div class="content">
						<span>Our Special Dish</span>
						<h3>Tasty Tomato soup </h3>
						<p>Tasty fresh and juicy tomatoes,onion,garlic and some fresh coriander for that amazing taste.</p>
						<a href="user_dashboard.php?home?category&id=7" class="btn">Order Now</a>
					</div>
					<div class="image">
						<img src="image/sup2.jpg" alt="">
					</div>
				</div>
			</div>
   			<div class="swiper-pagination"></div>
		</div>
	</section>
	<!-------------------------------home section ends here ------------------------------->

	<!-----------------------------category section starts here----------------------------->
	<section class="dishes" id="dishes" >
		<h3 class="sub-heading"> Our category </h3>
		<h1 class="heading"> Popular Categories </h1>
		<div class="box-container" >
		<?php
				$select_query = "SELECT * from category";
				$query = mysqli_query($con, $select_query);
				while($data = mysqli_fetch_assoc($query)){
					$image = $data['category_image'];
					?>
					<div class="box" style="border-radius: .5rem;">
						<!-- <a href="#" class="fas fa-heart"></a> -->
						<a href="user_dashboard.php?home?category&id=<?php echo $data['category_id'];?>" class="fas fa-eye"></a>
						<img style="width: 100%; height: 17rem; border-radius: .5rem;" src="<?php echo str_replace("../image","image", $image)?>" alt="dishes img">
						<h3><?php echo $data['category_name'];?></h3>
						<div class="starts">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa star-half-alt"></i>
						</div>
						<h5 style="font-weight: bold;"><br><?php echo $data['description'] ?></h5>
						<a href="user_dashboard.php?home?category&id=<?php echo $data['category_id'];?>" class="btn">View</a>
					</div>
					<?php
				}
			?>
		</div>
	</section>
	<!-----------------------------category section ends here-------------------------------> 

	<!-----------------------------about section starts here-------------------------------->
	<section class="about" id="about">
		<h3 class="sub-heading"> about us </h3>
		<h1 class="heading"> why choose us?</h1>
		<div class="row">
			<div class="image">
				<img src="image/no1.png" alt="about img">
			</div>
			<div class="content">
				<h3>Best food in the country</h3>
				<p></p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 	enim 	ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 		reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 	sunt in 	culpa qui officia deserunt mollit anim id est laborum.</p>
			
				<div class="icons-container">
					<div class="icons">
						<i class="fas fa-shipping-fast"></i>
						<span>free delivery</span>
					</div>
					<div class="icons">
						<i class="fas fa-inr"></i>
						<span>easy payment</span>
					</div>
					<div class="icons">
						<i class="fas fa-headset"></i>
						<span>24/7 service</span>
					</div>
 				</div>
				<a href="#about" class="btn">learn more</a>
			</div>
		</div>
	</section>
	<!-----------------------------about section ends here---------------------------------->

	<!-----------------------------dishes section starts here------------------------------->	
	<section class="menu" id="menu">
		<h3 class="sub-heading"> Our dishes </h3>
		<h1 class="heading"> today's speciality </h1>
		<div class="box-container">
			<?php
    	        $select_query = "select * from item";
    	        $query = mysqli_query($con, $select_query);
    	        while($data = mysqli_fetch_assoc($query)){
					$image = $data['item_image'];
					$type= $data['item_type'];
					if($type=='veg'){ $colour = '#27ae60'; }
					else{ $colour = '#a52a2a'; }
    	            ?>
					<div class="box">
						<div class="image">
							<img src="<?php echo str_replace("../image","image",$image);?>" alt="category img">
							<a href="manage_cart.php?id=<?php echo $data['item_id'];?>" class="fas fa-heart"></a>
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
		 					<a href="manage_cart.php?id=<?php echo $data['item_id'];?>" class="btn">add to cart</a>			
						</div>
					</div>
					<?php
				}
			?>
		</div>
	</section>
	<!-----------------------------dishes section ends here--------------------------------->
 	
	<!------------------------------review section starts here------------------------------>
	<section class="review" id="review">
		<h3 class="sub-heading"> Customer's review</h3>
		<h1 class="heading"> What they say</h1>
		<div class="swiper mySwiper review-slider">
			<div class="box-container swiper-wrapper ">

				<?php
            	include 'connection/connection.php';
            	$select_query = "SELECT * from reviews";
            	$query = mysqli_query($con, $select_query);

            	while($data = mysqli_fetch_assoc($query)){
            	    $user_id = $data['user_id'];
            	    $item_id = $data['item_id'];

            	    $select_query_user = "SELECT * from user where user_id= $user_id";
            	    $query_user= mysqli_query($con,$select_query_user);
            	    $data_user = mysqli_fetch_assoc($query_user);

            	    $select_query_item = "SELECT * from item where item_id= $item_id";
            	    $query_item= mysqli_query($con,$select_query_item);
            	    $data_item = mysqli_fetch_assoc($query_item);
            	    ?>

					<div class=" box swiper-slide slide">
						<i class="fas fa-quotr-right"></i>
						<div class="user">
							<img src="<?php echo str_replace("../image","image",$data_item['item_image']);?>">
								<div class="user-info">
									<h3><?php echo $data_user['fname']." ".$data_user['lname'];?></h3>
									<h4><?php echo $data_item['item_name']?></h4>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
								</div>
							</div>
						<p><?php echo $data['review'];?></p>
					</div>
            	    <?php
            	}
        		?>
			</div>
			<div class="swiper-pagination"></div>
    	</div>
	</section>
	<!------------------------------review section ends here-------------------------------->

	<!------------------------------ footer section starts here ---------------------------->
	<section class="footer" id="footer">
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
					<a href="#home">home</a>
					<a href="#menu">dishes</a>	
					<a href="#about">about</a>
					<a href="#dishes">category</a>
					<a href="#review">review</a>
					<a href="#order">order</a>
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
	<!-------------------------------footer section ends here-------------------------------->

