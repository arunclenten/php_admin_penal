<?php

@include 'db.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($connction, $_POST['name']);
   $email = mysqli_real_escape_string($connction, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = "SELECT * FROM user_login WHERE email = '$email' AND password = '$pass'";

   $result = mysqli_query($connction, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      $_SESSION['user_id'] = $row['id']; // Store user ID in session

      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         header('location:index.php');
      } elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('location:properties.php');
      }
     
   } else {
      $error[] = 'Incorrect email or password!';
   }
}
?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration </title> 
    <link rel="stylesheet" href="./assets/css/register.css">
   </head>
<body>
  <div class="wrapper">
    <h2>login</h2>
    <form action="" method="post">
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="email" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" name="password" required>
      </div>
      <div class="input-box button">
      <input type="submit" name="submit" value="Login" class="form-btn">
      </div>
      <div class="text">
            <h3><a href="forgotpassword.php">Forgot password?</a></h3>
         </div>
      <div class="text">
        <h3>You don't have an account? <a href="register.php">register now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>