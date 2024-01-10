<?php
include '../config.php';
$admin=new Admin();

$cid=$_SESSION['cid'];

if(isset($_POST['update'])){

    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $target="upload/";
	$image=$target.basename($_FILES['img']['name']);
	move_uploaded_file($_FILES['img']['tmp_name'], $image);


       
    $pass=password_hash($password,PASSWORD_BCRYPT);

            
         $stmt=$admin->cud("UPDATE `customer` SET `cust_name`='$name',`cust_email`='$email',`cust_phone`='$phone',`cust_img`='$image',`cust_password`='$pass',`cust_date`=now() WHERE `cust_id`='$cid'","updated");
         echo "<script>alert('Updated Successfully');
          window.location='../profile.php';
         </script>";
           

 }
      
    

?>