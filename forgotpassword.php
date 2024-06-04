<?php

@include 'db.php';

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($connction, $_POST['email']);

   $select = "SELECT * FROM user_login WHERE email = '$email'";
   $result = mysqli_query($connction, $select);

   if(mysqli_num_rows($result) > 0){
      $token = bin2hex(random_bytes(50)); // Generate a unique token
      $expFormat = mktime(
         date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
      );
      $expDate = date("Y-m-d H:i:s",$expFormat);
      
      $update = "UPDATE user_login SET reset_token='$token', token_expiry='$expDate' WHERE email='$email'";
      mysqli_query($connction, $update);

      $resetLink = "http://yourwebsite.com/reset_password.php?token=$token";

      // Send email
      $to = $email;
      $subject = "Password Reset Request";
      $message = "Click on this link to reset your password: $resetLink";
      $headers = "From: noreply@yourwebsite.com";

      if(mail($to, $subject, $message, $headers)){
         $success[] = 'Password reset link has been sent to your email!';
      } else {
         $error[] = 'Failed to send email!';
      }
   } else {
      $error[] = 'Email does not exist!';
   }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Forgot Password</title>
   <link rel="stylesheet" href="./assets/css/register.css">
</head>
<body>
   <div class="wrapper">
      <h2>Forgot Password</h2>
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
            <input type="text" placeholder="Enter your email" name="email" required>
         </div>
         <div class="input-box button">
            <input type="submit" name="submit" value="Request Password Reset" class="form-btn">
         </div>
      </form>
   </div>
</body>
</html>
