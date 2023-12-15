<?php
include('includes/connect.php');
include('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website - Cart details</title>
    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="style.css">

    <style>
    .cart_img{
    width: 180px;
    height: 180px;
    object-fit: contain;
    }
</style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./assets/illustration/logo1.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">
            <i class="fa-solid fa-cart-shopping"></i>
            <sub>
              <?php 
              cart_item();
              ?>
            </sub>
          </a>
        </li>        
      </ul>
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
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>

    <!-- third child -->
<div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communication is at the heart of e-commerce and community</p>
</div>

<!-- fourth child - table -->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bodered text-center">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
              <!-- dynamic data php -->
              <?php 
              $get_ip_add = getIPAddress(); 
              $total_price=0;
              $cart_query="SELECT * from cart_details where ip_address='$get_ip_add'";
              $result=mysqli_query($con, $cart_query);
              while($row=mysqli_fetch_array($result)){
                  $product_id=$row['product_id'];
                  $select_products="SELECT * from products where product_id='$product_id'";
                  $result_products=mysqli_query($con, $select_products);
                  while($row_product_price=mysqli_fetch_array($result_products)){
                      $product_price=array($row_product_price['product_price']);
                      $price_table=$row_product_price['product_price'];
                      $product_title=$row_product_price['product_title'];
                      $product_image1=$row_product_price['product_image1'];
                      $product_values=array_sum($product_price);
                      $total_price+=$product_values;
                      
              ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img class="cart_img" src="./admin_area/product_image/<?php echo $product_image1 ?>" alt=""></td>
                    <td><input type="text" class="form-input w-50" name="quantt"></td>
                    <?php
                    $get_ip_add = getIPAddress();
                    if(isset($_POST['update_cart'])){
                      $quantities=$_POST['quantt'];
                      $update_cart="UPDATE cart_details set quantity=$quantities where ip_address='$get_ip_add'";
                      $result_product_quantity=mysqli_query($con, $update_cart);
                      $total_price=$total_price*$quantities;
                    }
                    ?>
                    <td><?php echo $price_table ?>$</td>
                    <td><input type="checkbox" ></td>
                    <td>
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                        <input type="submit" name="update_cart" id="" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3">
                        <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button>
                    </td>
                </tr>
                <?php
                  }
                }
                ?>
            </tbody>
        </table>

        <!-- subtotal -->
        <div class="d-flex mb-5">
            <h4 class="px-3">
                Subtotal: <strong class="text-info"><?php echo $total_price ?>/-</strong>
            </h4>
            <a href="index.php">
                <button class="bg-info px-3 py-2 border-0 mx-3">Continue Shopping</button>
            </a>
            <a href="#">
                <button class="bg-secondary px-3 py-2 border-0 text-light">Checkout</button>
            </a>
        </div>
    </div>
</div>
              </form>

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