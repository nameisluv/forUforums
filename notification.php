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
                $id = $_SESSION['user_id'];
                $query = "SELECT * FROM problem;";
                $result = mysqli_query($conn, $query);

                while ($Row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td>your problrm of category <b><?php echo $Row["c_cat"]; ?></b> : <?php echo $Row["c_detail"]; ?> has been updated as <b><?php echo $Row["c_status"];?></b>.</td>
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