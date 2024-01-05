<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
?>
.
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Registration</title>
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
        <h2 class="text-center  mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class='col-lg-6 col-xl-4'>
                <img src="../assets/illustration/bunny.png" alt="Admin Registration" class='img-fluid'>
            </div>
            <div class='col-lg-6 col-xl-4'>
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_name" class="form-label" >Admin Name</label>
                        <input type="text" name="admin_name" id="admin_name" placeholder="Enter your name" required='required' class='form-control'>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label" >Email</label>
                        <input type="email" name="admin_email" id="admin_email" placeholder="Enter your email" required='required' class='form-control'>
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
                        <input type="submit" value="Register" class='bg-warning py-2 px-3 border-0' name='admin_registration'>
                        <p class="small fw-bold mt-2 pt-1 ">Already have an account? <a href="admin_login.php" class='link-warning'>Login</a></p>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>

<!-- php code -->
<?php 
if(isset($_POST['admin_register'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password, PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];

    $admin_ip=getIPAddress(); 
    // select query
    $select_admin_query="SELECT * from admin_table where admin_name='$admin_name' or admin_email='$admin_email'";
    $result_admin=mysqli_query($con,$select_admin_query);
    $row_count_admin=mysqli_num_rows($result_admin);
    if($row_count>0){
        echo "<script>alert('Admin Name or Email already exist')</script>";
    }else if($admin_password!=$confirm_password){
        echo "<script>alert('Password do not match')</script>";
    }else{
        // insert query
    $insert_admin_query="INSERT into admin_table(admin_name, admin_email, admin_password) values ('$admin_name','$admin_email','$hash_password')";
    $sql_execute=mysqli_query($con, $insert_admin_query);
    echo "<script>window.open('admin_login.php','_self')</script>";
    }
}