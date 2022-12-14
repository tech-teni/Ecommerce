<?php 
session_start();
echo   $_SESSION['user_id'];

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
    <!-- home section -->
    <section id="home">
        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Prices</span> For This Season</h1>
            <p>EShop offers the product for the most affordables prices</p>
            <button>Shop Now</button>
        </div>
    </section>

    <!-- brand -->
    <section id="brand" class="container">
        <div class="row">
            <img src="assets/imgs/versace.png" alt="" class="img-fluid col-lg-3 col-md-6 col-sm-13" />

            <img src="assets/imgs/pepsi.png" alt="" class="img-fluid col-lg-3 col-md-6 col-sm-13" />

            <img src="assets/imgs/michealkor.png" alt="" class="img-fluid col-lg-3 col-md-6 col-sm-13" />
            <img src="assets/imgs/nestle.png" alt="" class="img-fluid col-lg-3 col-md-6 col-sm-13" />
        </div>
    </section>
    <!-- new -->
    <section id="new" class="with-100">
        <div class="row p-0 m-0">
            <!-- one -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img src="assets/imgs/wristwatch.jpeg" alt="" class="img-fluid" />
                <div class="details">
                    <h2>Latest Wristwatches</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
            <!-- two -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img src="assets/imgs/bag.jpeg" alt="" class="img-fluid" />
                <div class="details">
                    <h2>Newest Bags</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>

            <!-- three -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img src="assets/imgs/shoe.jpeg" alt="" class="img-fluid" />
                <div class="details">
                    <h2>Awesome Shoes</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
        </div>
    </section>







    <!-- featured -->

    <section id="featured " class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr class="mx-auto" />
            <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">

            <?php include('server/get_featured_products.php') ;?>

            <?php while($row= $featured_products-> fetch_assoc()){    
              ?>

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/<?php  echo $row['product_image'] ;?>" alt="" class=" img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <h5 class="p-name"><?php  echo $row['product_name'] ?></h5>
                <h4 class="p-price">$<?php  echo $row['product_price'] ?></h4>
                <a href="single_product.php?product_id=<?php echo $row['product_id'];?>">
                    <button class="buy-btn">Buy Now</button>
                </a>
            </div>

            <?php  }  ?>

        </div>
    </section>

    <!-- banner -->
    <section id="banner" class="my-5 py-5">
        <div class="container">
            <h4>MID SEASON'S SALE</h4>
            <h1>
                Autumn Collection <br />
                UP to 30% OFF
            </h1>
            <button class="text-uppercase">Shop Now</button>
        </div>
    </section>

    <!-- cloth section -->
    <?php  include('server/get_clothes.php');?>


    <section id="clothes " class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Dresses & Coats</h3>
            <hr class="mx-auto" />
            <p>Here you can check out our amazing cloth</p>
        </div>
        <div class="row mx-auto container-fluid">
            <?php  while($row = $clothes_products->fetch_assoc()){   ?>

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/<?php echo $row["product_image"] ?>" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row["product_name"] ?></h5>
                <h4 class="p-price">$<?php echo $row["product_price"] ?></h4>
                <button class="buy-btn">Buy Now</button>
            </div>

            <!-- <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/c2.jpeg" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <h5 class="p-name">Sports shoes</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="buy-btn">Buy Now</button>
            </div> -->
            <!-- <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/c3.jpeg" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <h5 class="p-name">Sports shoes</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="buy-btn">Buy Now</button>
            </div> -->
            <!-- <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/c4.jpeg" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <h5 class="p-name">Sports shoes</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="buy-btn">Buy Now</button>
            </div> -->
            <?php } ?>
        </div>
    </section>

    <!-- wrsitwatches -->
    <section id="watches " class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Shoes</h3>
            <hr class="mx-auto" />
            <p>Here you can check out our amazing shoes</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/s1.jpeg" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Sports shoes</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/s2.jpeg" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <h5 class="p-name">Sports shoes</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/s3.jpeg" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <h5 class="p-name">Sports shoes</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/s4.jpeg" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <h5 class="p-name">Sports shoes</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
        </div>
    </section>
    <section id="shoes " class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Shoes</h3>
            <hr class="mx-auto" />
            <p>Here you can check out our amazing shoes</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/w1.jpeg" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Sports shoes</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/w2.jpeg" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <h5 class="p-name">Sports shoes</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/w3.jpeg" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <h5 class="p-name">Sports shoes</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/w4.jpeg" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <h5 class="p-name">Sports shoes</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="buy-btn">Buy Now</button>
            </div>
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