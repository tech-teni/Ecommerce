<?php 
include('server/connection.php');

if(isset($_GET['product_id'])) {
$product_id = $_GET['product_id'];

$stmt = "SELECT * FROM products where product_id =  $product_id";
$single_products = mysqli_query($conn, $stmt);

print_r($single_products);
}else{
  header('location: index.php');
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
    <!-- single-product -->
    <section class="container single-product my-5 pt-5">
        <!-- <div > -->
        <?php  while($row=$single_products->fetch_assoc() ){
               ?>
        <form action="cart.php" method="POST" class="row mt-5">
            <input type="hidden" name="product_id" value="<?php  echo $row['product_id']?>">
            <input type="hidden" name="product_image" value="<?php  echo $row['product_image']?>">
            <input type="hidden" name="product_price" value="<?php  echo $row['product_price']?>">
            <input type="hidden" name="product_name" value="<?php  echo $row['product_name']?>">

            <div class="col-lg-5 col-md-6 col-sm-12">

                <img src="assets/imgs/<?php  echo $row['product_image']?>" alt="" id="mainImg"
                    class="img-fluid w-100 pb-1" />
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php  echo $row['product_image']?>" alt="" width="100%"
                            class="small-img" />
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php  echo $row['product_image2']?>" alt="" width="100%"
                            class="small-img" />
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php  echo $row['product_image3']?>" alt="" width="100%"
                            class="small-img" />
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php  echo $row['product_image4']?>" alt="" width="100%"
                            class="small-img" />
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <h6><?php  echo $row['product_category']?></h6>

                <h3 class="py-4"><?php  echo $row['product_name']?></h3>
                <h2>$<?php  echo $row['product_price']?></h2>
                <input type="number" name="product_quantity" value="1" />
                <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
                <h4 class="mt-5 mb-5">Products Detail</h4>
                <span>This is beautiful and intriguing <b><?php  echo $row['product_description']?>.</b></span>
            </div>
        </form>
        <?php  }?>

        </div>
        </div>
    </section>

    <!-- related product -->
    <section id="related-product " class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Related Products</h3>
            <hr class="mx-auto" />
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/belt.jpeg" alt="" class="img-fluid mb-3" />
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
                <img src="assets/imgs/tshirt.jpeg" alt="" class="img-fluid mb-3" />
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
                <img src="assets/imgs/versacecap.jpeg" alt="" class="img-fluid mb-3" />
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
                <img src="assets/imgs/versacepant.jpeg" alt="" class="img-fluid mb-3" />
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
    <script>
    var mainImg = document.getElementById('mainImg')
    var smallImg = document.getElementsByClassName('small-img')

    smallImg[0].onclick = function() {
        mainImg.src = smallImg[0].src;
        console.log(smallImg)
    }

    for (let i = 0; i < 4; i++) {
        smallImg[i].onclick = function() {
            mainImg.src = smallImg[i].src;
            console.log(smallImg)
        }

    }
    </script>
</body>

</html>