<?php 
include('../includes/connect.php'); 
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user - Registration</title>
    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- style -->
    <style>
        body{
            overflow: hidden;
            background-color: #090F1B;
        }
    </style>
</head>
<body>
    <div class="container-fluid text-light my-3">
        <h2 class="text-center  mb-5">User Registration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class='col-lg-6 col-xl-4'>
                <img src="../assets/illustration/bunny.png" alt="user Registration" class='img-fluid'>
            </div>
            <div class='col-lg-6 col-xl-4'>
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label" >User Name</label>
                        <input type="text" name="user_username" id="user_username" placeholder="Enter your name" required='required' class='form-control'>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label" >Email</label>
                        <input type="email" name="user_email" id="user_email" placeholder="Enter your email" required='required' class='form-control'>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label" >Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password" required='required' class='form-control'>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label" >Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password" required='required' class='form-control'>
                    </div>
                    <div>
                        <input type="submit" value="Register" class='bg-warning py-2 px-3 border-0' name='user_registration'>
                        <p class="small fw-bold mt-2 pt-1 ">Already have an account? <a href="user_login.php" class='link-warning'>Login</a></p>
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
    $hash_password=password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();

    // select query
    $select_query="SELECT * from user_table where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Username or Email already exist')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Password do not match')</script>";
    }else{
        // insert query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="INSERT into user_table (username, user_email, user_password, 
    user_image, user_ip, user_address, user_mobile) values ('$user_username','$user_email',
    '$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con, $insert_query);
    }

    //select cart items
    $select_cart_item="SELECT* from cart_details where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_item);
    $row_count=mysqli_num_rows($result_cart);
    if($row_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
}   
?>





