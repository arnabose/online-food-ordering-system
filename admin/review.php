<?php
    include '../connection/connection.php';
?>
<div class="container">
    <div class="d-flex justify-content-between">
        <div class="p-2"><h2>Customer Reviews<h2></div>
    </div>
</div>
<div class="tbl-content">
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">Customer name</th>
                <th scope="col">Food</th>
                <th scope="col">Image</th>
                <th scope="col">Review</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include '../connection/connection.php';
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
                <tr>
                    <td><?php echo $data_user['fname']." ".$data_user['lname'];?></td>
                    <td><?php echo $data_item['item_name'];?></td>
                    <td><img src="<?php echo $data_item['item_image'];?>" width="261.71px" height="111.39px"></td>
                    <td><?php echo $data['review'];?></td>
                </tr>
                <?php
            }
        ?>
        </tbody>
    </table>
</div>
