<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $usn = mysqli_real_escape_string($conn, $_POST['usn']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $mobile_no = mysqli_real_escape_string($conn, $_POST['mobile_no']);
   $branch = mysqli_real_escape_string($conn, $_POST['branch']);
   $class = mysqli_real_escape_string($conn, $_POST['class']);
   $sec = mysqli_real_escape_string($conn, $_POST['sec']);
   $password = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM stud_info WHERE usn = '$usn' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($password != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO stud_info(name, gender, usn, email, mobile_no, branch, class, sec, password) VALUES('$name', '$gender' , '$usn','$email','$mobile_no','$branch','$class','$sec','$password')";
         mysqli_query($conn, $insert);
         header('location:index.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link rel="stylesheet" href="style1.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <select name="gender">
                                <option >M</option>
                                <option >F</option>
                                <option >O</option>

      </select>
      <input type="text" name="usn" required placeholder="enter your usn">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="text" name="mobile_no" required placeholder="enter your mobile no">
      <input type="text" name="class" required placeholder="enter your class">
      <input type="text" name="sec" required placeholder="enter your section">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="branch">
         <option value="IEM">IEM</option>
         <option value="ISE">ISE</option>
         <option value="CSE">CSE</option>
         <option value="ECE">ECE</option>
         <option value="EEE">EEE</option>
         <option value="MECH">MECH</option>
         <option value="CIVIL">CIVIL</option>
         <option value="MBA">MBA</option>
         <option value="MCA">MCA</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Admin login <a href="register_form_admin.php">here</a></p>
      <p>already have an account? <a href="index.php">login now</a></p>

   </form>

</div>
</body>
</html>