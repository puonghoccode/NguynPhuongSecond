
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <style>
        .table_heading{
            background-color: blue;
            color: aliceblue;
        }
    </style>
</head>
<body>
    <?php 

    $username=$_SESSION['username'];
    $get_user="SELECT * from user_table where username='$username'";
    $result=mysqli_query($con, $get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];

    ?>
<h3 class='text-success'>All my Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="table-head">
    <tr>
        <th>No</th>
        <th>Amount Due</th>
        <th>Total products</th>
        <th>Invoice number</th>
        <th>Order Date</th>
        <th>Completed/Incompleted</th>
        <th>Status</th>
    </tr>
    </thead>  
    <tbody class="bg-secondary text-light">
        <?php  
        $get_order_details="SELECT * from user_orders where user_id=$user_id";
        $result_orders=mysqli_query($con, $get_order_details);
        $number=1;
        while($row_orders=mysqli_fetch_assoc($result_orders)){
            $order_id=$row_orders['order_id'];
            $amount_due=$row_orders['amount_due'];
            $total_products=$row_orders['total_products'];
            $invoice_number=$row_orders['invoice_number'];
            $order_status=$row_orders['order_status'];
            if($order_status=='pending'){
                $order_status='Incomplete';
            }else{
                $order_status='Complete';
            }
            $order_date=$row_orders['order_date'];

            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>";
            ?>
            <?php
            if($order_status=='Complete'){
                echo "<td>Paid</td>";
            }else{
            echo "<td><a class='text-dark' href='confirm_payment.php?order_id=$order_id'>Confirm</a></td>
        </tr>";
            }
        $number++;
        }
        ?>
        
    </tbody>
</table>
</body>
</html>