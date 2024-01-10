<?php
include '../config.php';
$admin=new Admin();

$fid=$_GET['fid'];



$stmt=$admin->cud("DELETE FROM `feedback` WHERE `feed_id`='$fid'","deleted");
echo "<script>alert('Deleted');window.location='../viewfeedback.php';</script>";

?>