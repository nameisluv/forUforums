<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:index.php');
}

if(isset($_POST['submit'])){
   $id=$_SESSION['user_id'];
   $c_name = mysqli_real_escape_string($conn, $_POST['c_name']);
   $c_cat = mysqli_real_escape_string($conn, $_POST['c_cat']);
   $c_detail = mysqli_real_escape_string($conn, $_POST['c_detail']);
   $c_date = mysqli_real_escape_string($conn, $_POST['c_date']);
   $c_time = mysqli_real_escape_string($conn, $_POST['c_time']);

   $select = " SELECT * FROM problem WHERE s_id = '$id' && c_name = '$c_name' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'problem already exist in your forum!';

   }else{

         $insert = "INSERT INTO problem(c_name, c_cat, c_detail, c_date, c_time, s_id) VALUES('$c_name', '$c_cat', '$c_detail', '$c_date', '$c_time' , '$id')";
         mysqli_query($conn, $insert);
         header('location:student_dashboard.php');
   }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <title>Problem</title>
</head>

<body>

    <?php require 'components/nav_component.php' ?>

<style>body {
    font-family: 'Lato', sans-serif;
}

h1 {
    margin-bottom: 40px;
}

.btn-send {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    width: 80%;
    margin-left: 3px;
    }
.help-block.with-errors {
    color: #ff5050;
    margin-top: 5px;

}

.card{
	margin-left: 10px;
	margin-right: 10px;
}
.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:10px;
   padding-bottom: 60px;
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
   text-align: center;
   width: 100%;
}

.form-container form h3{
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   color:#eee;
}

.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #fbd0d9;
   color:crimson;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background: crimson;
   color:#fff;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:rgb(255, 255, 255);
}

.form-container form p a{
   color:crimson;
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: crimson;
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}
</style>


    <div class="form-container">          
    <form action="" method="post">
    <h3>Explain your problem</h3>
   <?php
   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      };
   };
   ?>
   <select name="c_cat">
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
   <input type="text" name="c_name" required placeholder="enter your problem subject">
   <input type="date" name="c_date" required placeholder="enter your problem date">
   <input type="time" name="c_time" required placeholder="enter your problem time">
   <input type="text" name="c_detail" required placeholder="write details about your problem">
   <input type="submit" name="submit" value="Submit problem" class="form-btn">
</form>

</div>

</body>

</html>