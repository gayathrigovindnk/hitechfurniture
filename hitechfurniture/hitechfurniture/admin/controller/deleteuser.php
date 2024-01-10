<?php
include '../config.php';
$admin=new Admin();

$cid=$_GET['cid'];



$stmt=$admin->cud("DELETE FROM `customer` WHERE `cust_id`='$cid'","deleted");
echo "<script>alert('Deleted');window.location='../viewUser.php';</script>";

?>