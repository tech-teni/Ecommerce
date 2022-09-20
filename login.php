<?php
include('server/connection.php');
// session_start();

if(isset($_POST['login_btn'])){
            $email= $_POST['email'];
            // $password= md5( $_POST['password']);
            $password= md5($_POST['password']);
            $stmt= "SELECT * from users
            WHERE user_password ='$password' AND user_email  = '$email';";
            echo $stmt;
            // answer
            $result = mysqli_query($conn, $stmt);
            echo mysqli_num_rows($result);

        if(mysqli_num_rows($result) == 1){
             $user_data = $result->fetch_assoc();
             $user_id= $user_data['user_id'] ;
             $user_name= $user_data['user_name'] ;
             $user_email= $user_data['user_email'] ;


            echo   'this is the user is '.$user_email;
            if(!isset($_SESSION)) {
                 session_start(); 
            }        
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['logged_in'] = true;
            
            echo 'the user Id is '. $_SESSION['user_id'] . 'with email'. $_SESSION['user_email']. 'and name '.$_SESSION['user_name']. 'with is login'. $_SESSION['logged_in'] ;

            header('location:index.php?login_success=loginsuccesfully');

        }
        else{
            $stmt2= "SELECT * from users WHERE
            user_email = '$email';";
            $result = mysqli_query($conn, $stmt2);

            echo $stmt2;

            if(mysqli_num_rows($result) == 1){
                header('location: login.php?error=wrong password');
  
            }else{
                header('location: login.php?error=no user found');

            }
        }
 }
//  else{
    // header('location: login.php?error=user not found');
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
</head>

<body>
    <!-- nav bar -->
    <?php 
 include('layout/header.php');
 ?>


    <!-- login -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">Login</h2>
            <hr class="mx-auto" />
        </div>
        <div class="mx-auto container">
            <form action="" id="login-form" action="login.php" method="POST">
                <p style="color: red;"><?php if(isset($_GET['error'])){  echo $_GET['error'];}?></p>
                <p style="color: blue;"><?php if(isset($_GET['message'])){  echo $_GET['message'];}?></p>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="login-email" name="email" placeholder="Email"
                        required />
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="Password" class="form-control" id="login-password" name="password"
                        placeholder="Password" required />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="login-btn" value="login" name="login_btn" />
                </div>
                <div class="form-group">
                    <a href="" id="register-url" class="btn">Dont have account? Register</a>
                </div>
            </form>
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