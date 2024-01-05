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
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../assets/illustration/favicon.ico">

    <!-- boostrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    .logo{
    width: 8%;
    height: 8%;
    }

    .admin-img {
    width: 90px;
    object-fit: contain;
    }

    .footer{
        position: absolute;
        bottom: 0;
    }
    body{
        overflow-x: hidden;
    }
    .product_img{
        width: 100px;
        object-fit: contain;
    }
    </style>
</head>
<body>
    <!--  navbar  -->
    <div class="container-fluid p-0">
        <!--   first child  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
            <img src="../assets/illustration/1.png" class="logo">
                <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link text-light">Welcome Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child  -->
        <div class="bg-warning">
            <h3 class="text-center p-2 mb-0">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row ">
            <div class="col-md-12 bg-dark p-1 d-flex align-items-center">
                <div class="button text-center">
                    <button class="my-3 bg-warning">
                        <a href="insert_product.php" class="nav-link text-light my-1">Insert Products</a>
                    </button>
                    <button class="my-3 bg-warning">
                        <a href="index.php?view_products" class="nav-link text-light my-1">View Products</a>
                    </button>
                    <button class="my-3 bg-warning">
                        <a href="index.php?insert_categories" class="nav-link text-light my-1">Insert Categories</a>
                    </button>
                    <button class="my-3 bg-warning">
                        <a href="index.php?view_categories" class="nav-link text-light my-1">View Categories</a>
                    </button>
                    <button class="my-3 bg-warning">
                        <a href="index.php?insert_brand" class="nav-link text-light my-1">Insert Brands</a>
                    </button>
                    <button class="my-3 bg-warning">
                        <a href="index.php?view_brands" class="nav-link text-light my-1">View Brands</a>
                    </button>
                    <button class="my-3 bg-warning">
                        <a href="index.php?list_orders" class="nav-link text-light my-1">All Order</a>
                    </button>
                    <button class="my-3 bg-warning">
                        <a href="index.php?list_payments" class="nav-link text-light my-1">All Payment</a>
                    </button>
                    <button class="my-3 bg-warning">
                        <a href="index.php?list_users" class="nav-link text-light my-1">List Users</a>
                    </button>
                    <button class="my-3 bg-warning">
                        <a href="" class="nav-link text-light my-1">Logout</a>
                    </button>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_product'])) {
                include('delete_product.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['edit_brands'])) {
                include('edit_brands.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('delete_brand.php');
            } 
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            } 
            if (isset($_GET['list_payments'])) {
                include('list_payments.php');
            } 
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            ?>
        </div>

    <!-- last child -->
    <?php
    include("../includes/footer.php")
    ?>

    </div>

    

    <!-- js link -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" ></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>