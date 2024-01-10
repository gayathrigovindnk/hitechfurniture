<?php
include '../config.php';
$admin=new Admin();

$pid=$_GET['payid'];

$stmt=$admin->cud("UPDATE `payment` SET `pay_status`='paid' WHERE `pay_id`='$pid'","updated");
echo "<script>alert('Status Updated.');window.location='../viewpayment.php';</script>";
?>