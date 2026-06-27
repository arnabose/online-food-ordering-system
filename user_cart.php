<!----------------- cart section starts here ----------------------->
    
    <div class="container">
	<h1 style="margin-top:7rem; padding:4rem;" class="heading"> My Cart </h1>
		<div class="row">
			<div class="col-lg-9">
           		<div class="tbl-content" style="text-align: center; ">
           		    <table class="table table-bordered table-hover">
           		    	<thead class="table-primary" style="font-size:1.5rem;" >
           		    	    <tr>
           		    	        <th scope="col">Item</th>
           		    	        <th scope="col">Item image</th>
           		    	        <th scope="col">Item price</th>
           		    	        <th scope="col">Quantity</th>
           		    	        <th scope="col" colspan='2'>Actions</th>
           		    	    </tr>
           		    	</thead>
						<?php
							$user_id = $_SESSION['user_id'];
							$total = 0;

							$select_query_cart = "select * from cart where user_id= $user_id";
 							$query_cart = mysqli_query($con, $select_query_cart);

							while($data_cart = mysqli_fetch_assoc($query_cart)){
								$cart_item_id = $data_cart['item_id'];
								$quantity = $data_cart['quantity'];
								$select_query_item = "select * from item where item_id= $cart_item_id";
								$query_item = mysqli_query($con,$select_query_item);
								while($data = mysqli_fetch_assoc($query_item)){
									$total = $total + ($quantity * $data['price']);
									?>
        	    					<tbody style="font-size:1.4rem;">
                		    			<tr>
                		    			    <td><?php echo $data['item_name']?></td>
											<td style=""><img  width="251.71px" height="101.39px" src="<?php echo str_replace("../image","image",$data['item_image']); ?>"></td>
                		    			    <td><?php echo $data['price']?></td>

											<form action="update_cart.php" method="get">
                		    			    	<td><input style="font-size: 1.3rem;" type="number" name="quantity" min="1" class="form-control" value="<?php echo $quantity?>"></td>
                		    			    	<td>
													<button style="padding: 2%; border: 1px solid green; border-radius: 8px" name="update" value="<?php echo $data['item_id']?>">
														<a style="color: green; font-weight: bold;">Update quantity</a>
													</button>
												</td>
											</form>

                		    			    <td>
												<button style="padding: 2%; border: 1px solid red; border-radius: 8px" name="remove">
													<a style="color: red; font-weight: bold;" href="user_dashboard.php?cart&id=<?php echo $data['item_id']?>">Remove</a>
												</button>
											</td>
										</tr>
									</tbody>	
									<?php
								}
							}				
						?>
					</table>
				</div>
			</div>
								
			<div class="col-lg-3" >
				<div class="border bg-light rounded p-4">
					<h2 style="font-weight: bold; color: #192a56; ">Total amount:</h2>
					<h3>Rs. <?php echo $total;?></h3><br><br>

					<input type="radio" class="form-check-input" name="pay online" value="pay online" id="flexRadioDisabled" disabled>
                       	<label class="form-check-label"><h5>Pay online (UPI /netbanking)</h5></label><br>
					<input type="radio" name="cash_on_delivery" value="pay on delivery"  checked>
                       	<label><h4>Pay on Delivery</h4></label>
					<form method="post">
						<button type="submit" name="order" class="btn"><h4>Order now</h4></button>
					</form>
				</div>
			</div>
		</div>
    </div>


<!------------------- for removing item from cart ------------------>
<?php
	if(isset($_GET['id'])){
		$item_id= $_GET['id'];

        $delete_query = "delete from cart where item_id = $item_id and user_id= $user_id";
        $query = mysqli_query($con, $delete_query);
        if($query){
            ?>
            <script>
                window.location.href="user_dashboard.php?cart";
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert('item failed to remove from your cart');
                window.location.href="user_dashboard.php?cart";
            </script>
            <?php
        }
    }
?>

<!-------------------------- for placing order -------------------------->
<?php
	if(isset($_POST['order'])){
		$user_id = $_SESSION['user_id'];
		$payment_method = "Pay on delivery";
		$select_cart= "select * from cart where user_id= $user_id";
		$query = mysqli_query($con,$select_cart);
		$cart_count = mysqli_num_rows($query);
		if($cart_count>0){
			while($data = mysqli_fetch_assoc($query)){
				$item_cart_id = $data['item_id'];
				$item_cart_quantity = $data['quantity'];
				$insert_query_orders = "INSERT INTO orders(user_id, item_id, quantity, payment_method, status, time) VALUES ('$user_id','$item_cart_id','$item_cart_quantity','$payment_method','success',now())";
				$query_order= mysqli_query($con,$insert_query_orders);
				if($query_order){
					$delete_cart = "DELETE FROM `cart` WHERE item_id= $item_cart_id";
					$delete_cart_query = mysqli_query($con,$delete_cart);
				}
				else{
					?>
					<script>
						alert('an error occurred');
					</script>
					<?php
				}
			}
			?>
				<script>
					window.location.href="user_dashboard.php?cart";
					alert('Order successful!');
				</script>
			<?php
		}
		else{
			?>
				<script>
					window.location.href="user_dashboard.php?cart";
					alert('Cart Empty!');
				</script>
			<?php
		}
	}
?>
