<?php
include '../config.php';
$admin=new Admin();
$cid=$_SESSION['cid'];

if(isset($_POST['checkout'])){

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $transaction=$_POST['transaction'];
    $paymethod=$_POST['payment_method'];
  

    $un=uniqid();
   

    $stmt=$admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pd_id=cart.pd_id WHERE `cust_id`='$cid'");
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $catid=$row['cat_id'];
        $pdid=$row['pd_id'];
        $cqty=$row['cart_qty'];
        $price=$row['pd_price'];

        $total=$cqty*$price;
        
        $pdqty=$row['pd_qty'];
        $remainingqty=$pdqty-$cqty;

        $stmt8=$admin->cud("UPDATE `product` SET `pd_qty`='$remainingqty' WHERE `pd_id`='$pdid'","updated");

	

    $stmt2=$admin->Rcud("INSERT INTO `orders`(`cust_id`,`cat_id`,`pd_id`,`od_qty`,`total`,`od_status`,`unid`,`od_date`)VALUES('$cid','$catid','$pdid','$cqty','$total','ordered','$un',now())");

    

    if($paymethod=='cash'){

    $stmt3=$admin->cud("INSERT INTO `payment`(`od_id`,`pay_method`,`pay_amt`,`pay_status`,`pay_date`)VALUES('$stmt2','$paymethod','$total','pending',now())","saved");

    } else {

        $stmt3=$admin->cud("INSERT INTO `payment`(`od_id`,`pay_method`,`pay_amt`,`trans_id`,`pay_status`,`pay_date`)VALUES('$stmt2','$paymethod','$total','$transaction','paid',now())","saved");

    }
    $stmt4=$admin->cud("INSERT INTO `shipping`(`od_id`,`cust_id`,`fname`,`lname`,`email`,`address`,`country`,`state`,`zip`,`unid`,`shp_date`)VALUES('$stmt2','$cid','$fname','$lname','$email','$address','$country','$state','$zip','$un',now())","saved");

    $stmt5=$admin->cud("DELETE FROM `cart` WHERE `cust_id`='$cid'","deleted");
    echo "<script>window.location='../thankyoupage.php';</script>";
    }
}
