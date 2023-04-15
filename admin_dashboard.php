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
    <title>Dashboard</title>
</head>
<body>

<?php require 'components/nav_component_admin.php'?>



<div class="container">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h2> <?php $sql = "SELECT a_name FROM admin_info 
                    WHERE a_id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['a_name'];
                      }
                    }
                    ?></h2>
                    </div>
                  </div>
                </div>
              </div>

            
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $sql = "SELECT a_name FROM admin_info 
                    WHERE a_id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['a_name'];
                      }
                    }
                    ?>
                    </div>
                  </div>
                  <hr>
        
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $sql = "SELECT a_gender FROM admin_info 
                    WHERE a_id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['a_gender'];
                      }
                    }
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $sql = "SELECT a_email FROM admin_info 
                    WHERE a_id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['a_email'];
                      }
                    }
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mbile no</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $sql = "SELECT a_mobile_no FROM admin_info 
                    WHERE a_id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['a_mobile_no'];
                      }
                    }
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Category</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $sql = "SELECT a_category FROM admin_info 
                    WHERE a_id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['a_category'];
                      }
                    }
                    ?>
                    </div>
                  </div>
                  
                  
                </div>
              </div>

              <div class="row gutters-sm">

                <div class="col-sm-12 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h3 class="d-flex align-items-center mb-3">Problem list</h3>



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
                                    $query = "SELECT * FROM problem WHERE c_cat='$a_category';";
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


              <div class="col-sm-12 mb-3">



            </div>
          </div>

        </div>
    </div>



</body>
</html>