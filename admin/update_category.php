<?php
    include 'dashboard.php';
    include '../connection/connection.php';
?>
<div class="position">
    <div class="box">
        <h3 style="color: #192a56; font-weight: bolder;">Update Category</h3>
        <form action="" method="post" enctype="multipart/form-data">

            <?php
                //fetching data from database to show filled values
                $id = $_GET['id'];
                $select_query = "select * from category where category_id= $id";
                $query = mysqli_query($con, $select_query);
                $data = mysqli_fetch_assoc($query);
                $current_image = $data['category_image'];
            ?>

            <div class="mb-3 col-md-12">
                <label class="form-label">Category name:</label>
                <input type="text" name="category_name" class="form-control" placeholder="Food category name" value="<?php echo $data['category_name']; ?>" required>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Description:</label>
                    <textarea  name="ctgry_descript" rows="3" cols="30" class="form-control" placeholder="Description of category"><?php echo $data['description']; ?></textarea>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Current image:</span></label>
                <img src="<?php echo $current_image;?>" style="height:94px; width:119px; border-radius: 8px;" >
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">New image:</span></label>
                <input type="file" name="new_category_image" class="form-control">
            </div>
            <div class="d-grid gap-2">    
                <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
</div>

<!------------ updating data to database ------------>
<?php
    if(isset($_POST['submit'])){
        $category_name =$_POST['category_name'];
        $category_description = $_POST['ctgry_descript'];
        $file = $_FILES['new_category_image'];
        // print_r($file);
        $file_name = $file['name'];
        // while updating if image is not selected, then it will pass the current image 
        if($file_name == ""){
            $update_query = "update category set category_id=$id, category_name='$category_name', description='$category_description',category_image='$current_image' where category_id= $id";
        }
        else{
            $temp_file_path = $file['tmp_name'];
            $destination_path = '../image/uploads/category/'.$file_name;
            move_uploaded_file($temp_file_path, $destination_path);

            $update_query = "update category set category_id=$id, category_name='$category_name', description='$category_description',category_image='$destination_path' where category_id= $id";
            // deleting the previous saved physical image
            unlink($current_image);
        }
        
        $query = mysqli_query($con,$update_query);
        
        if($query){
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Category updated successfully";
            ?>
            <script>
                window.location.href= "dashboard.php?category";
            </script>
            <?php    
        }
        else{
            $_SESSION['status'] = "danger";
            $_SESSION['message'] = "Failed to add category";
            ?>
            <script>
                window.location.href= "dashboard.php?category";
            </script>
            <?php 
        }
    }
?>