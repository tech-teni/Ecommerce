<?php 

session_start();
include('connection.php');
// if user not login 
    if(!isset($_SESSION['logged_in'])){
        header("location:login.php?error=pls login to place order");
        exit;
    }else{

        if(isset($_POST['place_order'])){
            echo "your order has been created and it is on it way ....................... ";
        //1- get user info and store it in the database
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $city = $_POST['city'];
                $address = $_POST['address'];
    
        //2- store order info in database
            //NOTE:  we need to get the order_cost from the session
            $order_cost= $_SESSION['total'];
            $order_status = "not paid";
            $user_id = $_SESSION['user_id'];
            $order_date = date('Y-m-d H:i:s');
            echo 'this is the user id '. $user_id . 'before any';
            // insert into the database
            $stmt = "INSERT INTO `orders` ( `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`, `email`) VALUES ('$order_cost', '$order_status', '$user_id', '$phone', '$city', '$address', ' $order_date', '$email');";
            $order = mysqli_query($conn, $stmt );
            
            // if order not stored 
            // if($order == false){
            //  header('location:index.php')  ;
            //  exit; 
            // }
    
                       
    
                    $order_id = mysqli_insert_id($conn); 
                        echo "New record created successfully. Last inserted ID is: " .  $order_id;
    
    
    
            //3 get products from cart &&  issue new order
    
            foreach($_SESSION['cart'] as $key => $value){
                $product = $_SESSION['cart'][$key]; //[]
                $product_id = $product['product_id'];
                $product_name = $product['product_name'];
                $product_price = $product['product_price'];
                $product_image= $product['product_image'];
                $product_quantity= $product['product_quantity'];
    
    
                // 4 and store order info in database
                $stmt1 = "INSERT INTO `order_items` (`order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`)  
                VALUES ('$order_id', '$product_id ', ' $product_name', '$product_image','$product_price','$product_quantity','$user_id', '$order_date' ); ";
                $order_items = mysqli_query($conn, $stmt1 );
    
                echo  $stmt1  ;
                echo  $order_items  ;
               $order_id= $_SESSION['order_id'];
    
            }
    
      // 5 remove everything from cart &&until payment is done
    //   unset($_SESSION['cart']);
    
    
    
    // 6-Inform user whether everything is fine or problem 
        header('location: payment.php?order_status=order placed succesfully');
    
    
    
        }else{
            
        }
    
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <?php echo $_SESSION['user_id']; ?>
</head>

<body>

</body>

</html>