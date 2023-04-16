<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_id'])){
   header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php require 'components/nav_component.php' ?>
    
<div class="container-fluid overflow-scroll">

<div class="row justify-content-center my-5">
    <div class="col-10">
        <table class="table table-bordered">
            <thead class="thead">
                <tr>
                    <th scope="col">Notification</th>                    
                </tr>
            </thead>
            <tbody>
                <?php


                require "config.php";
                $id=$_SESSION['user_id'];
                
                $query = "SELECT * FROM notifications WHERE us_id = '$id' ;";
                $result = mysqli_query($conn, $query);

                while ($Row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                   <?php $c_id = $Row['c_id'] ?>
<td>your problem of category <b><?php $query3 = "SELECT * FROM problem WHERE c_id = $c_id ;";  $result3 = mysqli_query($conn, $query3); $row3 = mysqli_fetch_assoc($result3); echo $row3["c_cat"]; ?></b> : <?php $query2 = "SELECT * FROM problem WHERE s_id = '$id' ;";  $result2 = mysqli_query($conn, $query2); $row2 = mysqli_fetch_assoc($result2); echo $row2["c_detail"]; ?> has been updated as <b><?php echo $Row["n_status"];?></b> on <b><?php echo $Row["n_day_time"];?></b>.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

</body>
</html>