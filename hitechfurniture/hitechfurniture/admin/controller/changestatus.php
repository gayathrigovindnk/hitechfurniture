<?php

    include '../config.php';
    $admin = new Admin();


    if(isset($_GET['orderstatus']) ){

         $status = $_GET['orderstatus'];
         $odid = $_GET['odid'];
           $stmt = $admin -> cud("UPDATE `orders` SET `od_status` = '$status' WHERE `od_id` = '$odid'  ","updated");
           echo "<script>alert('Status changed successfully.');window.location='../vieworder.php';</script>";      

    } 
    
    


    ?>