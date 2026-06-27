<?php
    include '../connection/connection.php';
?>
<div class="position">
    <div class="box">
        <h3 style="color: #192a56; font-weight: bolder;">Add Item</h3>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 col-md-12">
                <label class="form-label">Item name:</label>
                    <input type="text" name="item_name" class="form-control" placeholder="Name of the item" required>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Category name:</label>
                    <select class="form-control" name="category_name" required>
                        <option value="">Select Category</option>
                        <?php
                            $select_query = "select * from category";
                            $query = mysqli_query($con, $select_query);
                            while($data = mysqli_fetch_assoc($query)){
                                ?>
                                <option value="<?php echo $data['category_id'];?>"> <?php echo $data['category_name'];?> </option>
                                <?php
                            }
                        ?>
                    </select>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Description:</label>
                    <textarea  name="description" rows="3" cols="30" class="form-control" placeholder="Description or details of item"></textarea>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Price:</label>
                    <input type="number" name="price" min="0" class="form-control" required>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Item type:</label>
                    <input type="radio" name="item_type" value="veg"  required>
                        <label for="veg">veg</label>
                    <input type="radio" name="item_type" value="non-veg">
                        <label for="non-veg">non-veg</label>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Select image:</span></label>
                <input type="file" name="item_image" class="form-control" required>
            </div>
            <div class="d-grid gap-2">    
                <button type="submit" name="submit" class="btn btn-primary">Add Item</button>
            </div>
        </form>

    </div>
</div>

<!-------sending data to database ------>
<?php
    if(isset($_POST['submit'])){
        $item_name = $_POST['item_name'];
        $category_id = $_POST['category_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $item_type = $_POST['item_type'];
        $file = $_FILES['item_image'];

        // print_r($file);
        $file_name = $file['name'];
        $temp_file_path = $file['tmp_name'];
        $destination_path = '../image/uploads/items/'.$file_name;
        move_uploaded_file($temp_file_path, $destination_path);

        $insert_query = "insert into item(item_name, category_id, item_description, price, item_type, item_image) values('$item_name','$category_id','$description','$price','$item_type','$destination_path')";

        $query = mysqli_query($con, $insert_query);

        if($query){
            $_SESSION['i-status'] = "success";
            $_SESSION['i-message'] = "item added successfully";
            ?>
            <script>
                window.location.href= "dashboard.php?items";
            </script>
            <?php
        }
        else{
            $_SESSION['i-status'] = "danger";
            $_SESSION['i-message'] = "Failed to add item";
            ?>
            <script>
                window.location.href= "dashboard.php?items";
            </script>
            <?php
        }
    }
?>