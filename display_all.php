<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    <link rel="icon" type="image/x-icon" href="./assets/illustration/favicon.ico">
    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0 bg-dark text-warning">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg text-warning">
  <div class="container-fluid text-warning">
    <img src="./assets/illustration/1.png" class="logo">
    <button class="navbar-toggler text-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-warning" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="display_all.php">Products</a>
        </li>
        <?php 
        if(isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link text-warning' href='./user_area/profile.php'>My Account</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link text-warning' href='./user_area/user_registration.php'>Register</a>
        </li>";
        }
        ?>
        <li class="nav-item">
          <a class="nav-link text-warning" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="cart.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <sub>
            <?php 
              cart_item();
              ?>
            </sub>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="#">Total Price: <?php total_cart_price(); ?> /-</a>
        </li>
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="Search" placeholder="Search" 
        aria-label="Search" name="search_data">
        <input type="submit" name="search_data_product" id="" value="Search" 
        class="btn btn-outline-light">
      </form>
    </div>
  </div>
</nav>

    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
            <ul class="navbar-nav me-auto">
            <li class='nav-item'>
                    <a class='nav-link text-dark' href='#'>Welcome Guest</a>
                </li>
            <?php 
                if(!isset($_SESSION['username'])){
                  echo "<li class='nav-item'>
                  <a class='nav-link text-dark' href='./user_area/user_login.php'>Login</a>
              </li>";
                }else{
                  echo "<li class='nav-item'>
                  <a class='nav-link text-dark' href='./user_area/logout.php'>Logout</a>
              </li>";
                }
                ?>
            </ul>
        </nav>

    <!-- third child -->
<div class="bg-dark">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center text-light">Communication is at the heart of e-commerce and community</p>
</div>

    <!-- fourth child -->
<div class="row px-3 bg-dark">
    <div class="col-md-10 bg-dark">
        <!-- products -->
        <div class="row bg-dark">
            <!-- fetching products -->
            <?php
            //call function
            getproducts();
            get_unique_categories();
            get_unique_brands();
            //$ip = getIPAddress();  
            //echo 'User Real IP Address - '.$ip; 
            ?>
            
            <!-- row end -->
        </div>
        <!-- col end -->
    </div>

    <div class="col-md-2 bg-secondary p-0">
        <!-- brands displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-warning">
                <a href="#" class="nav-link text-dark">
                    <h4>Delivery Brands</h4>
                </a>
            </li>

            <?php 
            getbrands();
            ?>
        </ul>

        <!-- categories displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-warning">
                <a href="#" class="nav-link text-dark">
                    <h4>Category</h4>
                </a>
            </li>
            <?php 
            getcategories();
            ?>
        </ul>
    </div>
</div>

    <!-- last child -->
    <!-- includes footer -->
    <?php
    include("./includes/footer.php")
    ?>
</div>

    <!-- boostrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>