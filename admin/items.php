<div class="container">
    <div class="d-flex justify-content-between">
        <div class="p-2"><h2>Manage Food Items<h2></div>
        <div class="p-2"><a href="dashboard.php?items?add_item" class="btn btn-primary">Add Item</a></div>
    </div>
</div>

<!-------- displaying alert for adding and deleting -->
<?php
    if(isset($_SESSION['i-status'])){
        ?>
        <div class="alert alert-<?php echo $_SESSION['i-status']; ?> alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['i-message'];?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 
        <?php
        unset($_SESSION['i-status']);
    }
?>

<div class="tbl-content">
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Item</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Type</th>
                <th scope="col">Image</th>
                <th scope="col" colspan='2'>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include '../connection/connection.php';

                $select_query = "select * from item";
                $query = mysqli_query($con, $select_query);
                while($data = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td><?php echo $data['item_id'] ?></td>
                        <td><?php echo $data['item_name'] ?></td>
                        <td><?php echo $data['item_description'] ?></td>
                        <td>Rs. <?php echo $data['price'] ?></td>
                        <td><?php echo $data['item_type'] ?></td>
                        <td width="261.71px" height="111.39px"><img src="<?php echo $data['item_image']?>" width="100%" height="100%"></td>
                        <td><a class="fa-solid fa-pen-to-square" href="update_item.php?id= <?php echo $data['item_id']; ?>"></a></td>
                        <td><a class="fa-solid fa-trash-can" href="delete_item.php?id=<?php echo $data['item_id']; ?>"></a></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</div>
