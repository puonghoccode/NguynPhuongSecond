<?php 
include('../includes/connect.php'); 
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Login</title>
    <link rel="icon" type="image/x-icon" href="../assets/illustration/favicon.ico">

    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        body{
            overflow: hidden;
            background-color: #090F1B;
        }
    </style>
</head>
<body>
<div class="container-fluid text-light my-3">
        <h2 class="text-center  mb-5">User Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class='col-lg-6 col-xl-4'>
                <img src="../assets/illustration/bunny.png" alt="User Registration" class='img-fluid'>
            </div>
            <div class='col-lg-6 col-xl-4'>
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label" >Username</label>
                        <input type="text" name="user_username" id="user_username" placeholder="Enter your username" required='required' class='form-control'>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label" >Password</label>
                        <input type="password" name="user_password" id="user_password" placeholder="Enter your password" required='required' class='form-control'>
                    </div>
                    <div>
                        <input type="submit" value="Login" class='bg-warning py-2 px-3 border-0' name='user_login'>
                        <p class="small fw-bold mt-2 pt-1 ">Don't have an account? <a href="user_registration.php" class='link-warning'>Register</a></p>
                        </div>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>

<?php 
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    
    $select_query="SELECT * from user_table where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //cart items
    $select_query_cart="SELECT * from cart_details where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            //echo "<script>alert('Login Successful')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
                
            }
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>






