<?php
session_start();

include('connection.php');
if(isset($_GET['transaction_id']) && isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $order_status = 'paid';
    $transaction_id = $_GET['transaction_id'];
    $user_id = $_SESSION['user_id'];
    $payment_date = date('Y-m-d H:i:s');



    // change order_status to pay
    $stmt ="UPDATE orders SET order_status = '$order_status' WHERE order_id = '$order_id';";
    $result= mysqli_query($conn, $stmt);


    // store payment info 
    $stmt1="INSERT INTO `payments` (`order_id`,`user_id`, `transaction_id`' `payment_date`)  
    VALUES ('$order_id', '$user_id', '$transaction_id', '$payment_date'); ";
    $payment_details = mysqli_query($conn, $stmt1 );
    header('location:../account.php?payment_message=paid successfully, thanks for choosing Lumia');   

    // go to user account

     
}else{
        header('location:index.php');   
        exit;
    }



?>