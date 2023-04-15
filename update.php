<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_id'])){
   header('location:index_admin.php');
}


if (isset($_GET['c_status'])) { 
        $c_status = $_GET['c_status'];
        if($c_status=="solved")
        {
                $name = "pending";
        }
            else
        { 
                $name = "solved";
        }
        $c_id=$_GET['c_id'];
        $select = "UPDATE problem SET c_status='$name' WHERE c_id='$c_id';";
    
        $result = mysqli_query($conn, $select);

        if ($result) {  
            header('location:admin_category_forums.php');  
            }
       else{  
            echo "Error: ".mysqli_error($conn);  
           }
        }

        
?>