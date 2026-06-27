<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap v5.2.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- custom css link -->
    <link rel="stylesheet" href="./css/admin.css">

    <title>FOODIANS</title>
    <link rel="icon" href="image/logo.png">


</head>
<body>
    <div class="logo">
        <img src="image/logo.png" alt="logo" width="44" height="35">FOODIANS:)
    </div>
    <div class="position">
        <div class="box">
            <h3>USER SIGNUP</h3>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">First Name:<span class="text-danger">*</span></label>
                            <input type="text" name="fname" class="form-control" id="exampleInputEmail1" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name:<span class="text-danger">*</span></label>
                            <input type="text" name="lname" class="form-control" id="exampleInputEmail1" required>
                    </div>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">Email address:<span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">Mobile number:</label>
                    <input type="tel" name="phone" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">Address:</label>
                    <textarea  name="address" rows="3" cols="30" class="form-control" placeholder="Enter your address"></textarea>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">Password:<span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">Confirm Password:<span class="text-danger">*</span></label>
                    <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="d-grid gap-2">    
                    <button type="submit" name="submit" class="btn btn-primary">sign up</button>
                </div>
                <p>Already have an account? <a href="login.php">Log in</a></p>
            </form>
        </div>
    </div>

     <!-- Bootstrap v5.2.0 js link -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

<?php
    include 'connection/connection.php';
    if(isset($_POST['submit'])){
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        // encrypting password
        $encrpt_pwd = password_hash($password,PASSWORD_BCRYPT);
        // checking either email already exist or not in database
        $check_email = "select * from user where email='$email' ";
        $c_query = mysqli_query($con,$check_email);
        $email_count = mysqli_num_rows($c_query);
        if($email_count>0){
            ?>
            <script>
                alert('email already exist!');
            </script>
            <?php
        }
        else{
            if($password === $cpassword){
                $insert_query = "insert into user(fname, lname, email, mobile, address, password) VALUES('$first_name','$last_name','$email','$phone','$address','$encrpt_pwd')";
                $query = mysqli_query($con,$insert_query);
                if($query){
                    ?>
                    <script>
                        alert('Signup successful. Go to login page');
                        window.location.href= "login.php";
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        alert('signup failed');
                    </script>
                    <?php
                }
            }
            else{
                ?>
                <script>
                    alert('the password confirmation does not match!');
                </script>
                <?php
            }
        }
    }
?>
