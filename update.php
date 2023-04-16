<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_id'])){
   header('location:index_admin.php');
}


if (isset($_GET['c_status'])) { 
        // $id=$_SESSION['admin_id'];
        $c_status = $_GET['c_status'];
        if($c_status=="solved")
        {
                $new_status = "pending";
        }
            else
        { 
                $new_status = "solved";
        }

        $c_id=$_GET['c_id'];
        $que1 = "SELECT * FROM problem WHERE c_id='$c_id';";
        $result1 = mysqli_query($conn, $que1);
        $row1 = mysqli_fetch_assoc($result1);
        $que = $row1['s_id'];
        $currentdateandtime = date("Y-m-d H:i:s");

        
        $select = "UPDATE problem SET c_status='$new_status' WHERE c_id='$c_id';";
        $result = mysqli_query($conn, $select);
        
        $insert = "INSERT INTO `notifications` (`c_id`, `us_id`, `n_status`, `n_day_time`) VALUES ('$c_id' , $que , '$new_status', '$currentdateandtime')";
        $result2 = mysqli_query($conn, $insert);
        
        if ($result) {  
            header('location:admin_category_forums.php');  
            }
       else{  
            echo "Error: ".mysqli_error($conn);  
           }
        }
?>