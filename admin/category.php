<div class="container">
    <div class="d-flex justify-content-between">
        <div class="p-2"><h2>Manage Food Category<h2></div>
        <div class="p-2"><a href="dashboard.php?category?add_category" class="btn btn-primary">Add Category</a></div>
    </div>
</div>

<!-------- displaying alert for adding and deleting -->
<?php
    if(isset($_SESSION['status'])){
        ?>
        <div class="alert alert-<?php echo $_SESSION['status']; ?> alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['message'];?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 
        <?php
        unset($_SESSION['status']);
    }
?>

<div class="tbl-content">
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col" colspan='2'>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include '../connection/connection.php';

            $select_query = "SELECT * from category";
            $query = mysqli_query($con, $select_query);
            // $data = mysqli_fetch_assoc($query);
            while($data = mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?php echo $data['category_id'];?></th>
                    <td><?php echo $data['category_name'];?></th>
                    <td><?php echo $data['description'];?></th>
                    <td width="261.71px" height="111.39px"><img src="<?php echo $data['category_image'];?>" width="100%" height="100%"></th>
                    <td><a class="fa-solid fa-pen-to-square" href="update_category.php?id=<?php echo $data['category_id'];?>"></a></td>
                    <td><a class="fa-solid fa-trash-can" href="delete_category.php?id=<?php echo $data['category_id'];?>"></a></td>
                </tr>
                <?php
            }
        ?>
        </tbody>
    </table>
</div>
