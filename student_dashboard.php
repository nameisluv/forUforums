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
    <title>Dashboard</title>
</head>
<body>

<?php require 'components/nav_component.php'?>



<div class="container">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h2> <?php $sql = "SELECT name FROM stud_info 
                    WHERE id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['name'];
                      }
                    }
                    ?></h2>
                      <button class="btn btn-primary">Github</button>
                      <button class="btn btn-outline-primary">linkedin</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 mb-3 mt-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">post a problem</h6>
                           <a  href="problem.php"><button class="btn btn-primary">post a problem</button></a>
                     
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
                    <?php $sql = "SELECT name FROM stud_info 
                    WHERE id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['name'];
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
                    <?php $sql = "SELECT gender FROM stud_info 
                    WHERE id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['gender'];
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
                    <?php $sql = "SELECT email FROM stud_info 
                    WHERE id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['email'];
                      }
                    }
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">USN</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $sql = "SELECT usn FROM stud_info 
                    WHERE id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['usn'];
                      }
                    }
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile no</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $sql = "SELECT mobile_no FROM stud_info 
                    WHERE id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['mobile_no'];
                      }
                    }
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Class</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $sql = "SELECT class FROM stud_info 
                    WHERE id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['class'];
                      }
                    }
                    ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Section</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php $sql = "SELECT sec FROM stud_info 
                    WHERE id='".$_SESSION['user_id']."';";
                    $results = mysqli_query($conn, $sql);
                    $res = mysqli_num_rows($results);
                    if($res>0)
                    {
                      while($row = mysqli_fetch_array($results)){
                        echo $row['sec'];
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
                      
                      
                      
                      <h3 class="d-flex align-items-center mb-3">Your problem status</h3>
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
                                    $query = "SELECT * FROM problem WHERE s_id='$id';";
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


                            <h3 class="d-flex align-items-center mb-3">Your assignment status</h3>
              <div class="col-sm-12 mb-3">

                            <div class="row justify-content-center my-5">
                                    <div class="col-10">
                                        <table class="table table-bordered">
                                        <thead class="thead">
                                            <tr>
                                            <th scope="col">Sl no</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Assignment name</th>
                                            <th scope="col">Problem description</th>
                                            <th scope="col">Due date</th>
                                            <th scope="col">Status</th>                                            
                                            </tr>
                                        </thead>
                                    <tbody>      
                                <?php


                            require "config.php";
                                    $id = $_SESSION['user_id'];
                                    $query = "SELECT * FROM problem WHERE s_id='$id';";
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



            </div>
          </div>

        </div>
    </div>



</body>
</html>