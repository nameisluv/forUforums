<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_id'])){
   header('location:index_admin.php');
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
    
<?php require 'components/nav_component_admin.php' ?>
<div class="col-sm-12 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h3 class="d-flex align-items-center mb-3">Solved problems</h3>



                                           <div class="container-fluid overflow-scroll">

                                <div class="row justify-content-center my-5">
                                    <div class="col-10">
                                        <table class="table table-bordered">
                                        <thead class="thead">
                                            <tr>
                                            <th scope="col">Sl no</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Problen name</th>
                                            <th scope="col">Problem description</th>
                                            <th scope="col">date</th>
                                            <th scope="col">Status</th>                                            
                                            </tr>
                                        </thead>
                                    <tbody>      
                                <?php


                            require "config.php";
                                    $id = $_SESSION['user_id'];
                                    $query = "SELECT * FROM admin_info WHERE a_id='$id';";
                                    $result = mysqli_query($conn, $query);
                                    $Row = mysqli_fetch_assoc($result);
                                    $a_category = $Row['a_category'];
                                    $query = "SELECT * FROM problem WHERE c_status='solved';";
                                    $result = mysqli_query($conn, $query);

                                        while ($Row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $Row["c_id"]; ?></td>
                                        <td><?php echo $Row["c_cat"]; ?></td>
                                        <td><?php echo $Row["c_name"]; ?></td>
                                        <td><?php echo $Row["c_detail"]; ?></td>
                                        <td><?php echo $Row["c_date"]; ?></td>
                                        <td><?php echo $Row["c_status"]; ?></td>
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
                  </div>
                </div>
              </div>

</body>
</html>