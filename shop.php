<?php 
    include('server/connection.php');

         $stmt = "SELECT * FROM products ";
        $products = mysqli_query($conn, $stmt );


    // use search section
    /*
    if(isset($_POST['search'])){

        if(isset($_GET['page_no']) && $_GET['page_no'] != ''){
        // 1- if page number is already selected 
        //     $page_no = $_GET['page_no'];
        // }else{
            //1b  if user just entered the page then default page is  1
        //     $page_no = 1;
        // }

         $category = $_POST['category'];
        $price = $_POST['price'];

         //2-  we want to get total total number of product in the database  and it will  return number of product
        // $stmt1 = "SELECT COUNT(*) as total_records FROM products WHERE product_category =  $category ;";
        // $total_records = mysqli_query($conn, $stmt1 );

         // 3- product per page
        // $total_record_per_page= 8;
        // $offset = ($page_no -1)*  $total_record_per_page;
        // $previos_page = $page_no -1;
        // $next_page =$page_no +1;
        // $adjascents ="2";
        // $total_no_of_pages = ceil($total_records/$total_record_per_page);
    
        //4- get all products
        //  $stmt2 = "SELECT * FROM products WHERE product_category= $category LIMIT $offset, $total_records_per_page;";
        //  $products = mysqli_query($conn, $stmt );
        


    
       */
    // }else {
    //     if(isset($_GET['page_no']) && $_GET['page_no'] != ''){
            // 1- if page number is already selected 
        //     $page_no = $_GET['page_no'];
        // }else{
            //1b  if user just entered the page then default page is  1
        //     $page_no = 1;
        // }
        //2-  we want to get total total number of product in the database  and it will  return number of product
        // $stmt1 = "SELECT COUNT(*) as total_records FROM products ;";
        // $total_records = mysqli_query($conn, $stmt1 );
    
        // // 3- product per page
        // $total_record_per_page= 8;
        // $offset = ($page_no -1)*  $total_record_per_page;
        // $previos_page = $page_no -1;
        // $next_page =$page_no +1;
        // $adjascents ="2";
    
        // $total_no_of_pages = ceil($total_records/$total_record_per_page);
    
        //4- get all products
    //     $stmt2 = "SELECT * FROM products LIMIT $offset, $total_record_per_page ;";
    //     $products = mysqli_query($conn, $stmt );
    
    // }


 


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
    <style>
    .pagination a {
        color: coral;
    }

    .pagination li:hover a {
        color: white;
        background-color: coral;
    }
    </style>
</head>

<body>
    <!-- Nav Bar -->
    <?php 
 include('layout/header.php');
 ?>
    <!--search  -->
    <section id="search" class="my-5 py-5 ms-2">
        <div class="container mt-5 py-5">
            <p>Search Products</p>
            <hr />
        </div>

        <form action="shop.php" method="POST">
            <div class="row mx-auto container">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <p>Category</p>
                    <!-- category one -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="category" id="category_one" value="shoes" />
                        <label for="flexRadioDefault1" class="form-check-label">Shoes</label>
                    </div>
                    <!-- category two -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="category" id="category_two"
                            value="clothes" />
                        <label for="flexRadioDefault1" class="form-check-label">Clothes</label>
                    </div>
                    <!-- category three -->
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="category" id="category_four" value="belts" />
                        <label for="flexRadioDefault1" class="form-check-label">Belts</label>
                    </div>
                </div>

            </div>
            </div>
            <div class="row mx-auto container mt-5">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Price</p>
                    <input type="range" class="form-range w-50" min="1" max="10000" id="customerRange2" name="price"
                        value="1" />
                </div>
            </div>
            <div class="form-group my-3 mx-3">
                <input type="submit" name="search" value="Search" class="btn btn-primary" />
            </div>
        </form>
    </section>
    <!-- products -->
    <section id="featured " class="my-5 py-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Products</h3>
            <hr class="mx-auto" />
            <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container">

            <?php while($row= $products->fetch_assoc()){?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/<?php echo $row['product_image']?>" alt="" class="img-fluid mb-3" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']?></h5>
                <h4 class="p-price">$<?php echo $row['product_price']?></h4>
                <button class="buy-btn"><a href="single_product.php?product_id=<?php echo $row['product_id']?>">Buy
                        Now</a>
                </button>
            </div>
            <?php }?>
            <!-- <div class="product text-center col-lg-3 col-md-4 col-sm-12">
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
            </div> -->

            <nav aria-label="Page navigation example" class="mx-auto">
                <ul class="pagination mt-5 mx-auto">
                    <li class="page-item <?php if($page_no <= 1){ echo 'disabled';}?>">
                        <a class="page-link"
                            href="<?php   if($page_no <= 1){ echo '#';}else{ echo "?page_no=".($page_no-1); }?>">
                            Previous
                        </a>
                    </li>
                    <li class="page-item"><a href="?page_no=1" class="page-link">1</a></li>
                    <li class="page-item"><a href="?page_no=2" class="page-link">2</a></li>

                    <?php if(isset($page_no) && $page_no >= 3 ){?>
                    <li class="page-item"><a href="#" class="page-link">...</a></li>
                    <li class="page-item"><a href="<?php echo "?page_no=" .$page_no ?>"
                            class="page-link"><?php echo $page_no ?></a>
                    </li>
                    <?php }?>

                    <li class="page-item <?php if($page_no >= $total_no_of_pages){ echo 'disabled';}?>">
                        <a class="page-link"
                            href="<?php   if($page_no >= $total_no_of_pages){ echo '';}else{ echo "?page_no=".($page_no+1); }?>">
                            Next
                        </a>
                    </li>

                </ul>
            </nav>
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