<?php 
session_start();
?>

<nav class="navbar navbar-expand-lg bg-light fixed-top py-3">
    <div class="container">
        <h2>eShop!</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-button" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>

                <li class="nav-item nav-icon">
                    <a href="cart.php"><i class="fa-solid fa-cart-shopping">
                            <?php if(isset($_SESSION['quantity'])  &&  $_SESSION['quantity'] != 0){?>
                            <span class="cart-quantity"><?php echo $_SESSION['quantity'];?></span>
                            <?php }?>
                        </i></a>
                    <a href="account.php"><i class="fa-solid fa-user"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
.cart-quantity {
    background-color: var(--primary);
    color: white;
    padding: 2px 5px;
    border-radius: 50%;
    margin: 0 -3px;
}
</style>