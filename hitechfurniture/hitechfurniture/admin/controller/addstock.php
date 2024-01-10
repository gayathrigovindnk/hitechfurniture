<?php
include '../config.php';
$admin=new Admin();

if(isset($_POST['add'])){

    $pdid=$_POST['pdid'];
    $qty=$_POST['qty'];

    $stmt=$admin->cud("UPDATE `product` SET `pd_qty`='$qty' WHERE `pd_id`='$pdid'","updated");
    echo "<script>window.location='../viewstock.php';</script>";
}
?>