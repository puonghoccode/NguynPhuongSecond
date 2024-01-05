<h3 class='text-center text-success'>All Payments</h3>
<table class='table table-bordered mt-5'>
        <?php 
        $get_payments='SELECT * from user_payments';
        $result=mysqli_query($con, $get_payments);
        $row_count=mysqli_num_rows($result);
    if($row_count==0){
        echo"<h2 class='text-danger text-center mt-5'>No payments recieved yet</h2>";
    }else{
        echo "<thead class='bg-info text-center'> <tr>
        <th>No</th>
        <th>Invoice Number</th>
        <th>Amount</th>
        <th>Order Date</th>
        <th>Payment Mode</th>
        <th>Delete</th>
    </tr>
    </thead>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $payment_id=$row_data['payment_id'];
            $amount=$row_data['amount'];
            $invoice_number=$row_data['invoice_number'];
            $payment_mode=$row_data['payment_mode'];
            $date=$row_data['date'];
            $number++;
            echo "
            <tbody class='text-dark'>
            <tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$date</td>
            <td>$payment_mode</td>
            <td>
                <a href='' class='text-dark'>
                    <i class='fa-solid fa-trash'></i>
            </td>
        </tr>";
        }
    }
        ?>

        
</tbody>
</table>
