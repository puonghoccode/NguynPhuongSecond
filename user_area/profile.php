<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <link rel="icon" type="image/x-icon" href="../assets/illustration/favicon.ico">

    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
    <style>
      body{
        overflow-x: hidden;
      }
      .profile_img{
    width: 100%;
    /* height: 100%; */
    margin: auto;
    display: block;
    object-fit: contain;
}
.edit_image{
  width: 100px;
  height: 100px;
  object-fit: contain;
}
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
  <img src="./assets/illustration/1.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <sub>
              <?php 
              cart_item();
              ?>
            </sub>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?> /-</a>
        </li>
        
      </ul>
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" 
        aria-label="Search">
        <input type="submit" name="" id="" value="Search" class="btn btn-outline-light">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php 
cart();
?>

    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                </li>
                <?php 
                if(!isset($_SESSION['username'])){
                  echo "<li class='nav-item'>
                  <a class='nav-link' href='user_login.php'>Login</a>
              </li>";
                }else{
                  echo "<li class='nav-item'>
                  <a class='nav-link' href='logout.php'>Logout</a>
              </li>";
                }
                ?>
            </ul>
        </nav>

    <!-- third child -->
<div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communication is at the heart of e-commerce and community</p>
</div>

<!-- fourth child -->
<div class="row">
  <div class="col-md-2">
    <ul class="navbar-nav bg-secondary text-center" style="height: 100vh">
      <li class="nav-item bg-dark">
        <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
      </li>

      <?php 
      $username=$_SESSION['username'];
      $user_image="SELECT * from user_table where username='$username'";
      $user_image=mysqli_query($con, $user_image);
      $row_image=mysqli_fetch_array($user_image);
      $user_image=$row_image['user_image'];
      echo "<li class='nav-item'>
      <img src='./user_images/$user_image' class='profile_img my-2'>
    </li>";
      ?>
      
      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php">Pending orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?edit_account">Edit account</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link text-light" href="profile.php?my_orders">My orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?delete_account">Delete account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
  <div class="col-md-10 text-center">
  <?php 
  get_user_order_details();
  
  if(isset($_GET['edit_account'])){
  include('edit_account.php');
  }

  if(isset($_GET['my_orders'])){
    include('user_orders.php');
    }

    if(isset($_GET['delete_account'])){
      include('delete_account.php');
      }
  ?>
  </div>

</div>



    <!-- last child -->
    <!-- includes footer -->
    <?php
    include("../includes/footer.php")
    ?>
</div>

    <!-- boostrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>