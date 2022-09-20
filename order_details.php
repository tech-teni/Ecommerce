<?php
/*
unpaid
shipped
delivered

*/
include('server/connection.php');
if(isset($_POST['order_details_btn'])&& isset($_POST['order_id'])){
    $order_id=$_POST['order_id'];
    $order_status=$_POST['order_status'];
    $stmt="SELECT * FROM  order_items WHERE order_id ='$order_id';";
   $order_details = mysqli_query($conn, $stmt);
   $total_order_price= calculateTotalorderPrice($order_details);

}
else{
    // header('location:account.php');
// exit;
}
// calcualtion
function calculateTotalorderPrice ($order_details){
    $total = 0;
    foreach($order_details as $row){
    $product_price=  $row['product_price'];
    $product_quantity=  $row['product_quantity'];

    $total=  $product_price * $product_quantity;
    };
    return  $total;
   };
// end of calculation





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


    <!-- order details -->
    <section class="cart container my-5 py-5" id="order">
        <div class="container mt-2">
            <h2 class="font-weight-bold text-center">Order Details</h2>
            <hr class="mx-auto" />
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>quantity</th>
            </tr>
            <?php  foreach( $order_details as $row){ ?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $row['product_image']?>" alt="">
                        <div>
                            <p class="mt-3"><?php echo $row['product_name']?></p>
                        </div>
                    </div>

                </td>

                <td><span><?php echo $row['product_price']?></span></td>
                <td style="text-align: left;"><span><?php echo $row['product_quantity']?></span></td>

                <!-- <td style="text-align: left;">
                    <form action="">
                        <input type="submit" class=" button" value="more info">
                    </form>
                </td> -->
            </tr>
            <?php } ?>

        </table>
        <?php  if($order_status =='unpaid'){ ?>

        <form action="server/payment.php" method="POST">
            <input type="submit" name="order_pay_btn" id="" value="pay now" class="btn-primary">
            <input type="hidden" name="order_total_price" id="" value="<?php echo$total_order_price;?>">
            <input type="hidden" name="order_status" id="" value="<?php echo $order_status?>">
            <input type="hidden" name="order_id" id="" value="<?php echo $order_id?>">

        </form>


        <?php } 
  ?>


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