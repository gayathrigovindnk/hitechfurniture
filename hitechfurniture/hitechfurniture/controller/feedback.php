<?php
include '../config.php';
$admin=new Admin();

$cid=$_SESSION['cid'];

if(isset($_POST['send'])){
    $feedback=$_POST['feed'];
    $pdid=$_POST['pdid'];

    				

   

    $stmt=$admin->cud("INSERT INTO `feedback`(`pd_id`,`cust_id`,`message`,`feed_date`)VALUES('$pdid','$cid','$feedback',now())","inserted");
    echo "<script>window.location='../viewproduct.php?pid=$pdid';</script>";
}
?>