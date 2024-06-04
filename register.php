<?php

@include 'db.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($connction, $_POST['name']);
   $email = mysqli_real_escape_string($connction, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_login WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($connction, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_login(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($connction, $insert);
         header('location:login.php');
      }
   }

};


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
    <h2>Registration</h2>
    <form action="" method="post">
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="input-box">
        <input type="text" placeholder="Enter your name"  name="name" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="email" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" name="password" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm password" name="cpassword" required>
      </div>
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <!-- <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div> -->
      <div class="input-box button">
      <input type="submit" name="submit" value="register now" class="form-btn">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>