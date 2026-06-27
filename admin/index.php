<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap v5.2.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- custom css link -->
    <link rel="stylesheet" href="../css/admin.css">

    <title>ADMIN PANEL | FOODIANS</title>
    <link rel="icon" href="../image/logo.png">

</head>
<body>
    <div class="logo">
        <img src="../image/logo.png" alt="logo" width="44" height="35">FOODIANS:)
    </div>
    <div class="position">
        <div class="box">
            <h3>ADMIN LOGIN</h3>
            <?php
                if(isset($_SESSION['msg'])){
                    ?>
                    <h6 style="text-align:center; font-weight: bold; color:<?php echo $_SESSION['colour'];?>">
                        <?php echo $_SESSION['msg'];?>
                    </h6>
                    <?php
                    unset($_SESSION['msg']);
                    unset($_SESSION['colour']);
                }
            ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Email address:<span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password:<span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="d-grid gap-2">    
                    <button type="submit" name="submit" class="btn btn-primary">log in</button>
                </div>
                <p>Don't have an account? <a href="signup.php">Signup now</a></p>
            </form>
        </div>
    </div>

    <!-- Bootstrap v5.2.0 js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

<?php
    include '../connection/connection.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check_email = "select * from admin where email ='$email'";
        $query = mysqli_query($con,$check_email);

        $email_count = mysqli_num_rows($query);
        if($email_count){
            $data = mysqli_fetch_assoc($query);
            $database_password = $data['password'];

            $_SESSION['admin_name'] = $data['fname'];

            $check_password = password_verify($password, $database_password);
            if($check_password){
                ?>
                <script>
                    alert('Login successful');
                    location.replace('dashboard.php');
                </script>
                <?php
            }
            else{
                $_SESSION['colour'] = "red";
                $_SESSION['msg'] = "Incorrect Password";
                ?>
                <script>
                    window.location.href= "index.php";
                </script>
                <?php
            }
        }
        else{
            $_SESSION['colour'] = "red";
            $_SESSION['msg'] = "Email does't exist";
            ?>
            <script>
                window.location.href= "index.php";
            </script>
            <?php
        }
    }
?>