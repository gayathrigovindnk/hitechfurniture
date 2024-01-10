<?php
include('../config.php');
$admin=new Admin();

$semail=$_SESSION['supemail'];

if(isset($_POST['repass'])){
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];


if($password==$cpassword)
{
	$password=password_hash($password,PASSWORD_BCRYPT);
	  $sql=$admin->cud("UPDATE `customer` SET `cust_password`='$password' where `cust_email`='$semail'","saved");
	  echo "<script>alert('Password changed successfully.');
    window.location='../login.php';
 </script>"; 

}
else
{


	
	 echo "<script>alert('Password did not match');
    window.location='../createpassword.php';
 </script>";
}
}
?>