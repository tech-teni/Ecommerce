<!-- this is for payment.php, we want the customer coming from check out page to 
 total from cart and the user from the account/order to see the its amount-->


<?php if(isset($_POST['order_status'])){echo $_POST['order_status'];} ?>
<p>Total Payment: $ <?php if(isset($order_total_price)){ echo $order_total_price;}?> </p>
<?php  if(isset($_SESSION['total']) && $_SESSION['total']> 0){?>
<input type="submit" class="btn btn-primary" value="Pay Now">

<?php  }else{ ?>
<p>You dont have order</p>
<?php }?>