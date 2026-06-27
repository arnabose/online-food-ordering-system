<!----------------- reviews section starts here ----------------------->
    <h1 style="margin-top:7rem; padding:4rem;" class="heading"> My Reviews </h1>
    <div class="container">			
        <div class="tbl-content" style="text-align: center; ">
		    <table class="table table-bordered table-hover">
   		    	<thead class="table-primary" style="font-size:1.5rem;" >
		    	    <tr>
     		    	    <th scope="col">Item</th>
            	        <th scope="col">Item image</th>
        		        <th scope="col">my review</th>
        		    </tr>
            	</thead>
				<?php
					$user_id = $_SESSION['user_id'];
									
	    			$selectquery_review = "select * from reviews where user_id= $user_id";
					$query_review = mysqli_query($con, $selectquery_review);

					while($data_review = mysqli_fetch_assoc($query_review)){
						$item_id = $data_review['item_id'];
                        $review = $data_review['review'];
						$select_query_item = "select * from item where item_id= $item_id";
						$query_item = mysqli_query($con,$select_query_item);
						while($data = mysqli_fetch_assoc($query_item)){
							?>
                			<tbody style="font-size:1.4rem;">
    		    				<tr>
        	    	    		    <td><?php echo $data['item_name']?></td>
									<td style=""><img  width="251.71px" height="101.39px" src="<?php echo str_replace("../image","image",$data['item_image']); ?>"></td>
        	        			    <td><?php echo $review;?></td>        
								</tr>
							</tbody>	
							<?php
						}
				    }				
				?>
			</table>
		</div>
	</div>