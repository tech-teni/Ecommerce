<?php 

include('server/connection.php');
session_start();
// if log out button is clicked 
if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    unset($_SESSION);
    session_destroy();
         header('location:login.php');

  }
  header('location:login.php');

}

// if change password button is clicked 
if(isset($_POST['change_password'])){
  $password = $_POST['password'];
  $confirm_password = $_POST['confirmPassword']; 
  $email= $_SESSION['user_email'];
  $old_password = $_POST['old_password'];

  // get old passowrd from the database 
  // $get_old_password ="SELECT user_password FROM users where user_email =`$email`;";
  // echo  $get_old_password;
  // $result_of_oldPassoward = mysqli_query($conn, $get_old_password);
  // print_r($result_of_oldPassoward) ;

      // if password dont match
      if( $password !== $confirm_password){
            header("location:account.php?error=passwords dont match");
            echo "password!";
      }else if(strlen($password) < 6){
          // if password is less than 6 character
            header('location:account.php?error=password must be atleast 6 cahracters');
       }else{
          $stmt ="UPDATE users SET user_password =  '$password' WHERE user_email = '$email'";
          $result= mysqli_query($conn, $stmt);
          echo 'this is result '. $result;
          if( $result == 1){
            header('location:account.php?message=password successfully changed');

          }
          else{
            header('location:account.php?error=pls try again later');
          }
      }


  }



 



// get orders
if(isset($_SESSION["logged_in"])){
    // get user_id from session
    $user_id = $_SESSION['user_id'];
    //import orders
    $stmt = "SELECT * FROM orders  WHERE user_id = $user_id;";
    $orders = mysqli_query($conn, $stmt );
    
    
  
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
    <?php 
 include('layout/header.php');
 ?>

    <!-- Account -->
    <section class="my-5 py-5">
        <div class="container row mx-auto">
            <?php if(isset($_GET['payment_message'])){?>
            <p class="mt-5 text-center" style="color: purple;"><?php echo $_GET['payment_message']?></p>

            <?php } ?>
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Account Info</h3>
                <hr class="mx-auto" />
                <p>User ID:<?php  echo $_SESSION['user_id'];?> </p>
                <div class="account-info">
                    <p><?php echo  $_SESSION['user_name'];?></p>
                    <p>Email <span><?php echo  $_SESSION['user_email'];?></span></p>
                    <p><a href="#order" id="order-btn">Your orders</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form action="account.php" id="account-form" method="POST">
                    <h3>Change Password</h3>
                    <hr class="mx-auto" />
                    <p style="color: red;"><?php if(isset( $_GET['error'])){  echo $_GET['error'];};?></p>
                    <p style="color: blue;"><?php if(isset( $_GET['message'])){  echo $_GET['message'];};?></p>
                    <!-- <div class="form-group">
                        <label for=""> Old Password</label>
                        <input type="password" class="form-control" id="account-password" placeholder="old password"
                            name="old_password" required />
                    </div> -->

                    <div class="form-group">
                        <label for=""> New Password</label>
                        <input type="password" class="form-control" id="account-password" placeholder="New password"
                            name="password" required />
                    </div>
                    <div class="form-group">
                        <label for=""> Confirm New Password</label>
                        <input type="password" class="form-control" id="account-password-confirm"
                            placeholder=" new confirm password" name="confirmPassword" required />
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Change Password" class="btn" id="change-pass-btn"
                            name="change_password" />
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- orders -->
    <section class="cart container my-5 py-5" id="order">
        <div class="container mt-2">
            <h2 class="font-weight-bold text-center">Your orders</h2>
            <hr class="mx-auto" />
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Order id</th>
                <th>Order cost</th>
                <th>Order status</th>
                <th>Order date</th>
                <th>Order info</th>
            </tr>
            <?php  while($row=$orders->fetch_assoc()){?>

            <tr>
                <td>
                    <span class="mt-3"><?php echo $row['order_id'] ?></span>

                </td>
                <td><span><?php echo $row['order_cost'] ?></span></td>
                <td><span><?php echo $row['order_status'] ?></span></td>
                <td><span><?php echo $row['order_date'] ?></span></td>

                <td style="text-align: left;">
                    <form action="order_details.php" method="POST">
                        <input type="hidden" name="order_status" value=<?php echo$row['order_status'] ?>>
                        <input type="hidden" name="order_id" value=<?php echo $row['order_id']?>>
                        <input type="submit" class=" button" value="more info" name="order_details_btn">
                    </form>
                </td>
            </tr>


            <?php }?>
        </table>

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