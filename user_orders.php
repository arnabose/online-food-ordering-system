<!-----------------order section starts here ----------------------->
<h1 style="margin-top:7rem; padding:4rem;" class="heading"> My Orders </h1>
    <div class="container">
        <div class="tbl-content" style="text-align: center;">
            <table class="table table-bordered table-hover">
                <thead class="table-primary" style="font-size:1.5rem;">
                    <tr>
                        <th scope="col">Item name</th>
                        <th scope="col">Item image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">payment method</th>
                        <th scope="col">Status</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Write a review</th>
                    </tr>
                </thead>
                <tbody style="font-size:1.5rem;">
                    <?php
                        include 'connection/connection.php';

                        $select_query = "SELECT * from orders where user_id= $user_id";
                        $query = mysqli_query($con, $select_query);
                        while($data = mysqli_fetch_assoc($query)){
                            $item_id= $data['item_id'];

                            $select_query_items = "SELECT * from item where item_id= $item_id";
                            $query_item = mysqli_query($con, $select_query_items);
                            $data_item = mysqli_fetch_assoc($query_item);
                            ?>
                            <tr>
                                <td><?php echo $data_item['item_name'];?></td>
                                <td><img  width="261.71px" height="111.39px" src="<?php echo str_replace("../image","image",$data_item['item_image']);?>"></td>
                                <td>Rs. <?php echo $data_item['price'];?></td>
                                <td><?php echo $data['quantity'];?></td>
                                <td><?php echo ($data_item['price']*$data['quantity']);?></td>
                                <td><?php echo $data['payment_method'];?></td>
                                <td><?php echo $data['status'];?></td>
                                <td><?php echo $data['time'];?></td>
                                <td><a href="user_review.php?id=<?php echo $item_id?>" class="btn">Review</a></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>