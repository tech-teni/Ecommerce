<?php 
session_start();

if(!empty($_SESSION['cart']) &&  isset($_POST['checkout'])){
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
    <nav class="navbar navbar-expand-lg bg-light fixed-top py-3">
        <div class="container">
            <h2>eShop!</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-button" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.html">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>

                    <li class="nav-item nav-icon">
                        <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
                        <a href="account.html"><i class="fa-solid fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Checkout -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">Check Out</h2>
            <hr class="mx-auto" />
        </div>
        <div class="mx-auto container">
            <form action="server/place_order.php" id="checkout-form" method="POST">
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
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h1>eShop!</h1>
                <p class="pt-3">We give the best products</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">featured</h5>
                <ul class="text-uppercase">
                    <li><a href="">men</a></li>
                    <li><a href="">women</a></li>
                    <li><a href="">boys</a></li>
                    <li><a href="">girls</a></li>

                    <li><a href="">new arrivals</a></li>
                    <li><a href="">foods</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Contact Us</h5>
                <div>
                    <h6 class="text-uppercase">Address</h6>
                    <p>247 Street Name, Lagos, Nigeria</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Phone</h6>
                    <p>+23409099758749</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>name247@gmail.com</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Instagram</h5>
                <div class="row">
                    <img src="assets/imgs/trying.jpeg" alt="" class="img-fluid w-25 h-100 m-2" />
                    <img src="assets/imgs/trying.jpeg" alt="" class="img-fluid w-25 h-100 m-2" />
                    <img src="assets/imgs/trying.jpeg" alt="" class="img-fluid w-25 h-100 m-2" />
                    <img src="assets/imgs/trying.jpeg" alt="" class="img-fluid w-25 h-100 m-2" />
                    <img src="assets/imgs/trying.jpeg" alt="" class="img-fluid w-25 h-100 m-2" />
                </div>
            </div>
        </div>
        <div class="copy-right mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <img src="assets/imgs/payment.png" alt="payment" />
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-nowrap">
                    ecommerce @2023 All Right Reserve
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</body>

</html>