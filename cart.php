<?php

session_start();
 if(isset($_POST['add_to_cart'])){

      // if user has already added a product to cart 
        if(isset($_SESSION['cart'])){
          $product_array_ids = array_column($_SESSION['cart'], "product_id");
          
          // if product has already been added to cart or not 
          if(!in_array($_POST['product_id'],  $product_array_ids)){
          
              $product_id = $_POST['product_id'];

              $product_array= array(
              "product_id"=> $_POST['product_id'],
              "product_name"=> $_POST['product_name'],
              "product_price"=>  $_POST['product_price'],
              "product_image"=> $_POST['product_image'],
              "product_quantity"=> $_POST['product_quantity']
              );
        $_SESSION['cart'][$product_id] =  $product_array;
      


          }else{
            echo '<script>alert("product was already added")</script>';
            // echo '<script>window.location="index.php" </script>';

          }
          // if this is the first product
        }else{
          
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];
    
      $product_array= array(
          "product_id"=> $product_id,
          "product_name"=> $product_name,
          "product_price"=> $product_price,
          "product_image"=> $product_image,
          "product_quantity"=> $product_quantity
      );
      $_SESSION['cart'][$product_id] =  $product_array;

        }
        calculateTotalCart();

 }else if(isset($_POST['remove_product'])){
  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id ]);
  calculateTotalCart();

  // to remove product from cart 
 }else if(isset($_POST['edit_quantity'])){
 
      // we get the id and quantity from the form 
      $product_quantity = $_POST['product_quantity'];
      $product_id = $_POST['product_id'];

      // we get the product array from the session
      $product_array =$_SESSION['cart'][$product_id];


      // update product quantity
      $product_array['product_quantity'] = $product_quantity;

      //return array back to the session  
      $_SESSION['cart'][$product_id] = $product_array;
      calculateTotalCart();

 }else{
//   header("location:index.php");
 }

 ?>


<?php 
 function calculateTotalCart (){
    // $total variable is for total_price 
  $total = 0;
  $total_quantity =0;
    foreach($_SESSION['cart'] as $key => $value){
      $product = $_SESSION['cart'][$key];
       $price = $product['product_price'];
      $quantity = $product['product_quantity'];
      $total = $total + ($price *  $quantity);
      $total_quantity=  $total_quantity + $quantity;
    }
      $_SESSION['total']=  $total;
      $_SESSION['quantity']=  $total_quantity;

 };

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <!-- Nav Bar -->
    <?php 
 include('layout/header.php');
 ?>


    <!-- cart -->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Cart</h2>
            <hr />
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Sub-total</th>
            </tr>
            <?php foreach($_SESSION['cart'] as $key => $value) {     ?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['product_image']?>" alt="" />
                        <div class="">
                            <p><?php echo $value['product_name']; ?></p>
                            <small><span>$</span><?php echo $value['product_price']?></small>
                            <br />
                            <form action="cart.php" method="POST">
                                <input type="hidden" name='product_id' value='<?php echo $value['product_id']?>'>
                                <input type="submit" name='remove_product' class="remove-btn" value="remove"></input>

                            </form>
                        </div>
                    </div>
                </td>
                <td>
                    <form action="cart.php" method="POST">
                        <input type="hidden" value="<?php  echo  $value['product_id']?>" name="product_id">
                        <input type="number" value="<?php  echo $value['product_quantity']?>" name="product_quantity" />
                        <input type="submit" class="edit-btn" value="edit" name="edit_quantity">

                    </form>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price"><?php  
                     $sub_total = $value['product_quantity'] *  $value['product_price'];
                     echo $sub_total;
                     ?>
                    </span>
                </td>
            </tr>
            <?php } ?>

        </table>

        <div class="cart-total">
            <table>
                <!-- <tr>
                    <td>Subtotal</td>
                    <td>$<?php  
                     $sub_total = $value['product_quantity'] *  $value['product_price'];
                     echo $sub_total;
                     ?></td>

                </tr> -->
                <tr>
                    <td>Total</td>
                    <td>$ <?php echo $_SESSION['total'];  ?></td>
                </tr>

            </table>

        </div>
        <div class="checkout-container">
            <form action="checkout.php" method="POST">
                <button class="checkout-btn" value="Check out" name="checkout" type="submit">Check out</button>

            </form>
        </div>
    </section>

    <!-- footer -->
    <?php 
 include('layout/footer.php');
 ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</body>

</html>