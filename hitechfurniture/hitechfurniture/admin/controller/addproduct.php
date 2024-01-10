<?php
include  '../config.php';
$admin=new Admin();

if(isset($_POST['cat'])){
    $cat=$_POST['category'];

    $stmt=$admin->cud("INSERT INTO `category`(`cat_name`,`cat_date`)VALUES('$cat',now())","saved");
    echo "<script>window.location='../addproduct.php';</script>";
}


if(isset($_POST['addproduct'])){
    $catg=$_POST['catg'];
    $product=$_POST['product'];
    $about=$_POST['about'];
    $price=$_POST['price'];
    $gst=$_POST['gst'];
    $qty=$_POST['qty'];

    
    $target='upload/';
    $image=$target.basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$image);

    $stmt=$admin->cud("INSERT INTO `product`(`cat_id`,`pd_name`,`pd_image`,`pd_about`,`pd_price`,`pd_gst`,`pd_qty`,`pd_date`)VALUES('$catg','$product','$image','$about','$price','$gst','$qty',now())","saved");
    echo "<script>window.location='../viewproduct.php';</script>";
}



?>