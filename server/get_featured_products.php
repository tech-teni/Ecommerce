<?php

include('connection.php');

$stmt = "SELECT * FROM products LIMIT 4";
$featured_products = mysqli_query($conn, $stmt );

// print_r($featured_products)
?>