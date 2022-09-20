<?php 
    session_start();
    $user_id  = $_SESSION['user_id'];

    if(isset($_POST['order_pay_btn'])){
       $order_status=  $_POST['order_status'];
        $order_total_price= $_POST['order_total_price'];
        echo $order_total_price;

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
 include('../layout/header.php');
 ?>

    <!-- payment  -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">Payment</h2>
            <hr class="mx-auto" />
        </div>
        <div class="mx-auto container text-center">
            <p style="text-align: left;">UserId: <?php echo $user_id;?></p>
            <?php  if(isset($_POST['order_status']) && $_POST['order_status']== "not paid"){?>
            <?php $order_id= $_POST['order_id'];?>
            <?php  $amount = strval($_POST['order_total_price'])?>

            <p>Total payment: $<?php echo $_POST['order_total_price']?></p>
            <!-- <input type="submit" class="btn btn-primary " value="Pay Now"> -->
            <div id="paypal-button-container"></div>


            <?php  } else if(isset($_SESSION['total']) && $_SESSION['total'] !=0) { ?>
            <?php  $amount = strval($_SESSION['total'])?>
            <?php $order_id= $_SESSION['order_id'];?>
            <p>Total payment: $<?php echo $_SESSION['total'];?></p>
            <!-- <input type="submit" class="btn btn-primary" value="Pay Now"> -->
            <div id="paypal-button-container"></div>


            <?php } else {?>
            <p>You dont have an order</p>
            <?php }?>

            <!-- coming frompaypal -->
            <!-- Set up a container element for the button -->
            <!-- end of paypal  -->
        </div>
    </section>
    <!-- ********PAYMENT GATEWAY *********************************************-->

    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=ARJ4IBzar-6nYzDBJtKPWkBHUDuvTHleZ2P7BmLeLBtfvmsGXuOasp35D8UAwXPc2Wv-5lI38MyvZDBS&currency=USD">
    </script>

    <script>
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $amount?>' // Can also reference a variable or function
                    }
                }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                alert(
                    `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
                );

                window.location.href = 'server/complete_payment.php?transaction_id=' + transaction
                    .id + '&order_id=' + <?php echo $order_id?>
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }
    }).render('#paypal-button-container');
    </script>
    <!-- footer -->
    <?php 
 include('../layout/footer.php');
 ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</body>

</html>