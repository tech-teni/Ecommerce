<?php 

session_start();
include('connection.php');

    if(isset($_POST['place_order'])){
        echo "your order has been created and it is on it way";
    //1- get user info and store it in the database
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            $address = $_POST['address'];

    //2- store order info in database
        //NOTE:  we need to get the order_cost from the session
        $order_cost= $_SESSION['total'];
        $order_status = "on_hold";
        $user_id = 1;
        $order_date = date('Y-m-d H:i:s');



//  $stmt = "INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date, email) VALUES($order_cost, '$order_status', $user_id, $phone,  '$city' , '$address', $order_date, '$email');";
//  $order = mysqli_query($conn, $stmt );


//  $stmt = "INSERT INTO orders (order_cost, user_id) VALUE($order_cost,$user_id);";
//  $order = mysqli_query($conn, $stmt );


 $stmt = "INSERT INTO `orders` ( `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`, `email`) VALUES ('$order_cost', '$order_status', ' $user_id', '$phone', '$city', '$address', ' $order_date', '$email');";
 $order = mysqli_query($conn, $stmt );


 echo  $stmt;
 print_r($conn);

 echo  $order ;
        // lets get the order ID to create order_items

    //3- issue new order and store order info in database
// ******************************************************* correct syntax



// ***********************************************

    // 4- store each single item in order_items database


  // 5 remove everything from cart 


// 6-Inform user whether everything is fine or problem 

    }else{
        
    }

?>