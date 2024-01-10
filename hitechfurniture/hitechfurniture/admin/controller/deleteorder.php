<?php
include '../config.php';
$admin=new Admin();

$oid=$_GET['oid'];



$stmt=$admin->cud("DELETE FROM `orders` WHERE `od_id`='$oid'","deleted");
echo "<script>alert('Deleted');window.location='../vieworder.php';</script>";

?>