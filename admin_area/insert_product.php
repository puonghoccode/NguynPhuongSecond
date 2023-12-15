<?php 
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $keywords=$_POST['keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    // images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    $product_image4=$_FILES['product_image4']['name'];
    $product_image5=$_FILES['product_image5']['name'];
    // image tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];
    $temp_image4=$_FILES['product_image4']['tmp_name'];
    $temp_image5=$_FILES['product_image5']['tmp_name'];
    // check emty
    if($product_title=='' or $description==''or $keywords=='' or $product_category=='' 
    or $product_brand=='' or $product_price=='' or $product_image1=='' 
    or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill all the availble fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1, "./product_image/$product_image1");
        move_uploaded_file($temp_image2, "./product_image/$product_image2");
        move_uploaded_file($temp_image3, "./product_image/$product_image3");
        move_uploaded_file($temp_image4, "./product_image/$product_image4");
        move_uploaded_file($temp_image5, "./product_image/$product_image5");
        // insert query
        $insert_product="insert into products (product_title, description, 
        keywords, category_id, brand_id, product_image1, product_image2, 
        product_image3, product_image4, product_image5, product_price, date, 
        status) values ('$product_title', '$description', '$keywords', '$product_category',
        '$product_brand', '$product_image1', '$product_image2', '$product_image3',
        '$product_image4', '$product_image5', '$product_price', NOW(), '$product_status')";
        $result_query=mysqli_query($con,$insert_product);
        if($result_query){
            echo "<script>alert('Successful inserted')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <!-- boostrap CSS link -->
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous"> 

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keywords" class="form-label">Product keywords</label>
                <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php 
                    $select_query="Select * from categories";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                    
                </select>
            </div>

            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php 
                    $select_query="Select * from brands";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <!-- image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>

            <!-- image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- image 4 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image4" class="form-label">Product image 4</label>
                <input type="file" name="product_image4" id="product_image4" class="form-control" required="required">
            </div>

            <!-- image 5 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image5" class="form-label">Product image 5</label>
                <input type="file" name="product_image5" id="product_image5" class="form-control" required="required">
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- insert btn -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </form>
    </div>
</body>
</html>