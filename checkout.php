<?php 
session_start();

if(!empty($_SESSION['cart'])){
//  let user in
}else{
    // send user to home page 
    header("location: index.php");
}


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

    <!-- Checkout -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">Check Out</h2>
            <hr class="mx-auto" />
        </div>
        <div class="mx-auto container">
            <form action="server/place_order.php" id="checkout-form" method="POST">
                <p class="text-center" style="color: red;"><?php 
                 if(isset($_GET['error'])){
                    echo $_GET['error'];
                 }?></p>
                <div class="form-group checkout-small-element">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name"
                        required />
                </div>

                <div class="form-group checkout-small-element">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="checkout-email" name="email" placeholder="Email"
                        required />
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Phone Number</label>
                    <input type="tel" class="form-control" id="checkout-password" name="phone" placeholder="phone"
                        required />
                </div>
                <div class="form-group checkout-small-element">
                    <label for=""> City</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City"
                        required />
                </div>
                <div class="form-group checkout-large-element">
                    <label for=""> Address</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="address"
                        required />
                </div>

                <div class="form-group checkout-btn-container">
                    <p>Total amount: $ <?php  echo $_SESSION['total'] ?></p>
                    <input type="submit" class="btn" id="checkout-btn" value="place Order" name="place_order" />
                </div>
                <div class="form-group">
                    <a href="" id="login-url" class="btn">Do you have an account? Login</a>
                </div>
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