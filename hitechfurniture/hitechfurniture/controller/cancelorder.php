<?php
include '../config.php';
$admin=new Admin();

$odid=$_GET['odid'];

$stmt=$admin->cud("UPDATE `orders` SET `od_status`='cancelled' WHERE `od_id`='$odid'","updated");
echo "<script>alert('Order Cancelled');window.location='../orderstatus.php';</script>";
?>