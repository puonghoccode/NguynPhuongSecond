<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="icon" type="image/x-icon" href="./assets/illustration/favicon.ico">

    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <style>
        .payment_img{
            width: 10cm;
            margin: auto;
            display: block;
        }
    </style>
</head>
<body class='bg-dark'>
    <!-- php code to access user id  -->
    <?php 
    $user_ip=getIPAddress();
    $get_user="SELECT * from user_table where user_ip='$user_ip'";
    $result=mysqli_query($con, $get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];

    ?>
    <div class="container bg-dark">
        <h2 class="text-center text-warning">Payment Option</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank">
                    <img src="../assets/illustration/pay.jpg" alt="" class="payment_img">
                    <h2 class='text-center text-warning'>Pay Online</h2>
                </a>
                
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id; ?>">
                <img src="../assets/illustration/pay2.png" alt="" class="payment_img">
                <h2 class='text-center text-warning'>Pay Offline</h2>
            </a>
            </div>
        </div>
    </div>
</body>
</html>