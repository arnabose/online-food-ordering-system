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

				<form action="manage_cart.php" method="post">
					<div class="box">
						<div class="image" style="height: 33rem;">
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
				</form>
				<?php
			}
			?>
		</div>
	</section>
	<!----------------------------------dishes section ends here---------------------------->

    <!---------------------------------footer section starts here--------------------------->
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
	<!---------------------------------footer section ends here ---------------------------->