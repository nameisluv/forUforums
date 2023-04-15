<?php

@include 'config.php';

session_start();
ini_set('display_errors', 0);

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['a_name']);
   $category = mysqli_real_escape_string($conn, $_POST['a_category']);
   $email = mysqli_real_escape_string($conn, $_POST['a_email']);
   $mobile_no = mysqli_real_escape_string($conn, $_POST['a_mobile_no']);
   $password = md5($_POST['a_password']);
   $cpass = md5($_POST['a_cpassword']);

   $select = " SELECT * FROM admin_info WHERE a_email = '$email' && a_password = '$password' ";

   $result = mysqli_query($conn, $select);
   $row = mysqli_fetch_array($result);

   if(mysqli_num_rows($result) > 0){
         $_SESSION['user_id'] = $row['a_id'];
         header('location:admin_dashboard.php');  
   }
   else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Admin login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="a_email" required placeholder="enter your email">
      <input type="password" name="a_password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form_admin.php">register now</a></p>
   </form>

</div>
</body>
</html>