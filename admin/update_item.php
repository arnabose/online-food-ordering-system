<?php
    include 'dashboard.php';
    include '../connection/connection.php';
?>
<div class="position">
    <div class="box">
        <h3 style="color: #192a56; font-weight: bolder;">Update Item</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <?php
                //fetching data from item table to show filled values
                $id = $_GET['id'];
                $select_query = "select * from item where item_id= $id";
                $query = mysqli_query($con, $select_query);
                $data = mysqli_fetch_assoc($query);
                $current_category_id = $data['category_id'];
                $current_image = $data['item_image'];
                $item_type = $data['item_type'];
            ?>
            <div class="mb-3 col-md-12">
                <label class="form-label">Item name:</label>
                    <input type="text" name="item_name" class="form-control" placeholder="Name of the item" value="<?php echo $data['item_name'];?>" required>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Select category:</label>
                    <select class="form-select" name="category_name" required>
                        <?php
                            //fetching data from category table to show all available categories
                            $select_query_category = "select * from category";
                            $query_category = mysqli_query($con, $select_query_category);
                            while($data_category = mysqli_fetch_assoc($query_category)){
                                ?>
                                <option value="<?php echo $data_category['category_id'];?>" <?php if($current_category_id==$data_category['category_id']){echo "selected";}?> > <?php echo $data_category['category_name'];?> </option>
                                <?php
                            }
                        ?>
                    </select>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Description:</label>
                    <textarea  name="description" rows="3" cols="30" class="form-control" placeholder="Description or details of item"><?php echo $data['item_description'];?></textarea>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Price:</label>
                    <input type="number" name="price" min="0" class="form-control" value="<?php echo $data['price'];?>" required>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Item type:</label>
                    <input type="radio" name="item_type" value="veg" <?php if($item_type == "veg"){ echo "checked"; }?> >
                        <label for="veg">veg</label>
                    <input type="radio" name="item_type" value="non-veg" <?php if($item_type == "non-veg"){ echo "checked"; }?> >
                        <label for="non-veg">non-veg</label>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Current image:</span></label>
                <img src="<?php echo $current_image;?>" style="height:94px; width:119px; border-radius: 8px;" >
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">New image:</span></label>
                <input type="file" name="new_item_image" class="form-control">
            </div>
            <div class="d-grid gap-2">    
                <button type="submit" name="submit" class="btn btn-primary">Update Item</button>
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
        $file = $_FILES['new_item_image'];
        // while updating if image is not selected, then it will pass the current image 
        $file_name = $file['name'];
        if($file_name == ""){
            $update_query = "update item set item_id='$id', item_name='$item_name', category_id='$category_id', item_description='$description', price='$price', item_type='$item_type', item_image='$current_image' where item_id= $id";
        }
        else{
            $temp_file_path = $file['tmp_name'];
            $destination_path = '../image/uploads/items/'.$file_name;
            move_uploaded_file($temp_file_path, $destination_path);

            $update_query = "update item set item_id='$id', item_name='$item_name', category_id='$category_id', item_description='$description', price='$price', item_type='$item_type', item_image='$destination_path' where item_id= $id";
            // deleting the previous saved physical image
            unlink($current_image);
        }
        $query = mysqli_query($con,$update_query);

        if($query){
            $_SESSION['i-status'] = "success";
            $_SESSION['i-message'] = "item updated successfully";
            ?>
            <script>
                window.location.href= "dashboard.php?items";
            </script>
            <?php
        }
        else{
            $_SESSION['i-status'] = "danger";
            $_SESSION['i-message'] = "Failed to update item";
            ?>
            <script>
                window.location.href= "dashboard.php?items";
            </script>
            <?php
        }
    }
?>