<?php 
include('../includes/connect.php'); 
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Registration</title>
    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class='form-label'>Username</label>
                        <input type="text" name="user_username" id="user_username" class='form-control' 
                        placeholder="Enter your username" autocomplete="off" required='required'>
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class='form-label'>Email</label>
                        <input type="email" name="user_email" id="user_email" class='form-control' 
                        placeholder="Enter your email" autocomplete="off" required='required'>
                    </div>
                    <!-- image field -->
                    <div class="form-outline">
                        <label for="user_image" class='form-label'>Profile Image</label>
                        <input type="file" name="user_image" id="user_image" class='form-control' >
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class='form-label'>Password</label>
                        <input type="password" name="user_password" id="user_password" class='form-control' 
                        placeholder="Enter your password" autocomplete="off" required='required'>
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class='form-label'>Confirm Password</label>
                        <input type="password" name="conf_user_password" id="conf_user_password" class='form-control' 
                        placeholder="Confirm Password" autocomplete="off" required='required'>
                    </div>
                    <!-- address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class='form-label'>Address</label>
                        <input type="text" name="user_address" id="user_address" class='form-control' 
                        placeholder="Enter your address" autocomplete="off" required='required'>
                    </div>
                    <!-- contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class='form-label'>Contact</label>
                        <input type="text" name="user_contact" id="user_contact" class='form-control' 
                        placeholder="Enter your mobile number" autocomplete="off" required='required'>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" name="user_register" id="" value="Register" class='bg-info py-2 px-3 border-0'>
                        <p class='small fw-bold mt-2 pt-1 mb-0'>Already have an account? <a class="text-danger" href='user_login.php'>Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
<?php 
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();

    // insert query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="INSERT into user_table (username, user_email, user_password, 
    user_image, user_ip, user_address, user_mobile) values ('$user_username','$user_email',
    '$user_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con, $insert_query);
    if($sql_execute){
        echo "<script>alert('Data inserted successfully')</script>";
    }else{
        die("Connection failed: " . $con->connect_error);
    }
}   
?>





