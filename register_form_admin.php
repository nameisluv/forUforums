<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['a_name']);
   $a_gender = mysqli_real_escape_string($conn, $_POST['a_gender']);
   $category = mysqli_real_escape_string($conn, $_POST['a_category']);
   $email = mysqli_real_escape_string($conn, $_POST['a_email']);
   $mobile_no = mysqli_real_escape_string($conn, $_POST['a_mobile_no']);
   $password = md5($_POST['a_password']);
   $cpass = md5($_POST['a_cpassword']);

   $select = " SELECT * FROM stud_info WHERE usn = '$usn' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($password != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO admin_info(a_name, a_gender, a_category, a_email, a_mobile_no, a_password) VALUES('$name', '$a_gender' , '$category','$email','$mobile_no','$password')";
         mysqli_query($conn, $insert);
         header('location:index_admin.php');
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
   <title>Admin register form</title>
   <link rel="stylesheet" href="style1.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Admin register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="a_name" required placeholder="enter your name">
      <select name="a_category">
                                <option >Classroom</option>
                                <option >Electronics</option>
                                <option >Food</option>
                                <option >Hostel</option>
                                <option >Lab Equipments</option>
                                <option >Library</option>
                                <option >Maintainance</option>
                                <option >Ragging</option>
                                <option >Requirments</option>
                                <option >Sports</option>
                                <option >Studies</option>
                                <option >Transportation</option>
      </select>
      <select name="a_gender">
                                <option >M</option>
                                <option >F</option>
                                <option >O</option>

      </select>
      <input type="email" name="a_email" required placeholder="enter your email">
      <input type="text" name="a_mobile_no" required placeholder="enter your mobile no">
      <input type="password" name="a_password" required placeholder="enter your password">
      <input type="password" name="a_cpassword" required placeholder="confirm your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="index_admin.php">login now</a></p>
      <p>Admin login <a href="register_form_admin.php">here</a></p>

   </form>

</div>
</body>
</html>