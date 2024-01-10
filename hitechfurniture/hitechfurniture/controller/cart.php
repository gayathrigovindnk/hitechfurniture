<?php
include '../config.php';
$admin=new Admin();

$cid=$_SESSION['cid'];
$pdid=$_POST['pdid'];
$cqty=$_POST['cqty'];

 $stmt = $admin->ret("SELECT * FROM `cart` WHERE `pd_id`='$pdid' AND `cust_id`='$cid'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $num = $stmt->rowCount();
    if($num>0){
        $updatedquant = 0;
        $dbqty =$row['cart_qty'];
        $updatedquant = $cqty + $dbqty;
        $stmt1 = $admin->cud("UPDATE `cart` SET  `cart_qty` = '$updatedquant' WHERE `pd_id` = '$pdid' AND `cust_id` = '$cid'","updated");
        echo "<script>window.location='../cart.php';</script>";
     
    }else{
          
 $stmt2=$admin->cud("INSERT INTO `cart`(`pd_id`,`cust_id`,`cart_qty`,`cart_date`)VALUES('$pdid','$cid','$cqty',now())","saved");
 echo "<script>window.location='../cart.php';</script>";

    }


?>
