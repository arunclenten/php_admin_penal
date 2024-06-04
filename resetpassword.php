<?php

@include 'db.php';

if(isset($_GET['token'])){

   $token = mysqli_real_escape_string($connction, $_GET['token']);
   $select = "SELECT * FROM user_login WHERE reset_token='$token' AND token_expiry > NOW()";
   $result = mysqli_query($connction, $select);

   if(mysqli_num_rows($result) > 0){

      if(isset($_POST['submit'])){
         $password = md5($_POST['password']);
         $cpassword = md5($_POST['cpassword']);

         if($password == $cpassword){
            $update = "UPDATE user_login SET password='$password', reset_token=NULL, token_expiry=NULL WHERE reset_token='$token'";
            mysqli_query($connction, $update);

            $success[] = 'Password has been updated!';
         } else {
            $error[] = 'Passwords do not match!';
         }
      }

   } else {
      $error[] = 'Invalid or expired token!';
   }

} else {
   header('location:forgot_password.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Reset Password</title>
   <link rel="stylesheet" href="./assets/css/register.css">
</head>
<body>
   <div class="wrapper">
      <h2>Reset Password</h2>
      <form action="" method="post">
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         if(isset($success)){
            foreach($success as $success){
               echo '<span class="success-msg">'.$success.'</span>';
            };
         };
         ?>
         <div class="input-box">
            <input type="password" placeholder="New Password" name="password" required>
         </div>
         <div class="input-box">
            <input type="password" placeholder="Confirm New Password" name="cpassword" required>
         </div>
         <div class="input-box button">
            <input type="submit" name="submit" value="Reset Password" class="form-btn">
         </div>
      </form>
   </div>
</body>
</html>
