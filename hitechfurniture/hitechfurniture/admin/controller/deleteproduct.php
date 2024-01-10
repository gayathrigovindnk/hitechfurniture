<?php
include '../config.php';
$admin=new Admin();

$pid=$_GET['pid'];



$stmt=$admin->cud("DELETE FROM `product` WHERE `pd_id`='$pid'","deleted");
echo "<script>alert('Deleted');window.location='../viewproduct.php';</script>";

?>