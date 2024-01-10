<?php
include '../config.php';
$admin=new Admin();

$cid=$_SESSION['cid'];


    
    $postid=$_GET['pid'];

    $stmt1=$admin->ret("SELECT * FROM `feedback` WHERE  `pd_id`='$postid' AND `cust_id`='$cid' AND `type`='liked'");
    $num=$stmt1->rowCount();
    if($num>0){
        $stmt=$admin->cud("DELETE FROM `feedback` WHERE `pd_id`='$postid' AND `cust_id`='$cid'","saved");
    } else {
$stmt=$admin->cud("INSERT INTO `feedback`(`cust_id`,`pd_id`,`type`,`feed_date`)VALUES('$cid','$postid','liked',now())","saved");

    } 
    $stmt5 = $admin->ret("SELECT * FROM `feedback` WHERE `type`='liked' AND `pd_id`='$postid'");
    $num1=$stmt5->rowCount();
     echo $num1." "."Likes";
?>