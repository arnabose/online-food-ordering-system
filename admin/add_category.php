<div class="position">
    <div class="box">
        <h3 style="color: #192a56; font-weight: bolder;">Add Category</h3>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 col-md-12">
                <label class="form-label">Select category:</label>
                <input type="text" name="category_name" class="form-control" placeholder="Food category name" required>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Description:</label>
                    <textarea  name="ctgry_descript" rows="3" cols="30" class="form-control" placeholder="Description of category"></textarea>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Select image:</span></label>
                <input type="file" name="category_image" class="form-control" required>
            </div>
            <div class="d-grid gap-2">    
                <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
        </form>

    </div>
</div>

<!------- inserting data to database  ------>
<?php
    include '../connection/connection.php';

    if(isset($_POST['submit'])){
        $category_name = $_POST['category_name'];
        $category_description = $_POST['ctgry_descript'];
        $file = $_FILES['category_image'];
        // print_r($file);
        $file_name = $file['name'];
        $temp_file_path = $file['tmp_name'];
        $destinstion_path = '../image/uploads/category/'.$file_name;
        move_uploaded_file($temp_file_path, $destinstion_path);

        $insert_query = "insert into category(category_name, description, category_image) values('$category_name','$category_description','$destinstion_path')";

        $query = mysqli_query($con,$insert_query);
        
        if($query){
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Category added successfully";
            header('location: dashboard.php?category'); 
        }
        else{
            $_SESSION['status'] = "danger";
            $_SESSION['message'] = "Failed to add category";
            header('location: dashboard.php?category');
        }
    }
?>


       