<?php

@include 'config.php';

session_start();
ini_set('display_errors', 0);

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $usn = mysqli_real_escape_string($conn, $_POST['usn']);
   $password = md5($_POST['password']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $mobile_no = mysqli_real_escape_string($conn, $_POST['mobile_no']);
   $branch = mysqli_real_escape_string($conn, $_POST['branch']);
   $class = mysqli_real_escape_string($conn, $_POST['class']);
   $sec = mysqli_real_escape_string($conn, $_POST['sec']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM stud_info WHERE usn = '$usn' && password = '$password' ";

   $result = mysqli_query($conn, $select);
   $row = mysqli_fetch_array($result);

   if(mysqli_num_rows($result) > 0){
         $_SESSION['user_id'] = $row['id'];
         header('location:student_dashboard.php');  
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
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="usn" required placeholder="enter your usn">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Admin login <a href="index_admin.php">here</a></p>
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>
</body>
</html>