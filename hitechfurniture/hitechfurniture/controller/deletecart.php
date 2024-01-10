<?php
include '../config.php';
$admin=new Admin();

$cartid=$_GET['cartid'];

$stmt=$admin->cud("DELETE FROM `cart` WHERE `cart_id`='$cartid'","deleted");
echo "<script>window.location='../cart.php';</script>";
?>