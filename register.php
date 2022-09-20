<?php

// REGEXP '^[A-Za-z0-9._%\-+!#$&/=?^|~]+@[A-Za-z0-9.-]+[.][A-Za-z]+$' icase needed 

session_start();
include("server/connection.php");

if(isset($_POST['register'])){
        $name=  $_POST['name'];
        $email=  $_POST['email'];
        $password = md5( $_POST['password']);
        $confirmPassword= md5($_POST['confirmPassword']) ;

    // if password dont match
        if( $password !== $confirmPassword){
          header("location: register.php?error=passwords dont match");
          echo "password!";
        }else if(strlen($password) < 6){
         // if password is less than 6 character
          header('location: register.php?error=password must be atleast 6 cahracters');
        }else{
              // check whether there is a user with this email or not
       $find_user = "SELECT * from users
       WHERE user_email  = '$email'; ";
       $old_user = mysqli_query($conn, $find_user);
   
      if(mysqli_num_rows( $old_user) != 0){
               header("location: register.php?error=user with this email already exists");
       }else{
         // if no user reegister with this email before lets create account
        // ?create  a new user
           $stmt= "INSERT INTO `users` (`user_name`,`user_email`, `user_password`	) 
           VALUES('$name', '$email', '$password');";
           $user = mysqli_query($conn, $stmt);
           echo    $stmt;
           echo $user;
       
           if(!mysqli_connect_errno()){
             $stmt2="SELECT * FROM users WHERE user_email = '$email'; ";
             $result2= mysqli_query($conn, $stmt2);
             $user_info= $result2->fetch_assoc();

            //extract the info from the database to be saved in the session
            $user_id= $user_info['user_id'] ;
            $user_name= $user_info['user_name'] ;
            $user_email= $user_info['user_email'] ;


            // save the info in session
             $_SESSION['user_id'] =  $user_id;
             $_SESSION['user_email'] =$user_email;
             $_SESSION['user_name'] = $user_name;
             $_SESSION['logged_in'] = true;

             echo $stmt2;

             print_r($user_info);
             header("location: index.php?register=you registered successfully");
           }else{
             header("location: register.php?error=could not creat account at the moment");

           }

       }
   

        }


    
     
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
 include('layout/header.php');
 ?>



    <!-- Register -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">Resgister</h2>
            <hr class="mx-auto" />
        </div>
        <div class="mx-auto container">
            <form action="register.php" id="register-form" method="POST">
                <p style="color: red;"><?php if(isset($_GET['error'])){  echo $_GET['error'];}?></p>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" required />
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="register-email" name="email" placeholder="Email"
                        required />
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="Password" class="form-control" id="register-password" name="password"
                        placeholder="Password" required />
                </div>
                <div class="form-group">
                    <label for=""> Confirm Password</label>
                    <input type="Password" class="form-control" id="register-confirm-password" name="confirmPassword"
                        placeholder=" Confirm Password" required />
                </div>

                <div class="form-group">
                    <input type="submit" class="btn" id="register-btn" value="Register" name="register" />
                </div>
                <div class="form-group">
                    <a href="login.php" id="login-url" class="btn">Do you have an account? Login</a>
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