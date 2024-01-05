<?php 

if(isset($_GET['delete_brand'])){
    $delete_id=$_GET['delete_brand'];

    $delete_brand="DELETE from brands where brand_id=$delete_id";
    $result_brand=mysqli_query($con, $delete_brand);
    if($result_brand){
        echo "<script>alert('Brand deleted')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}

?>