<?php

include('connection.php');

$stmt = "SELECT * FROM products  WHERE product_category = 'clothes' LIMIT 4";
$clothes_products = mysqli_query($conn, $stmt );

// print_r($featured_products)
?>



