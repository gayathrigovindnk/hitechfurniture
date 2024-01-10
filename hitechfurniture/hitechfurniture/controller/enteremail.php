<?php 
include '../config.php';
$admin=new Admin();

if(isset($_POST['enteremail'])){
    $email=$_POST['email'];
    $stmt=$admin->ret("SELECT * FROM `customer` WHERE `cust_email`='$email' ");
$num=$stmt->rowCount();
if($num>0){
    echo "email  exist";
    $otp=rand(999999,111111);
    echo $_SESSION['otp']=$otp;
    echo $_SESSION['supemail']=$email;
    header("location:../phpmailer/index.php?email=$email");
}else{
    echo "<script>alert('email does not exists');window.location='../login.php';</script>";
}
}

?>