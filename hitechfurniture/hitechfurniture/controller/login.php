<?php 
include '../config.php';
$admin=new Admin();
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $stmt=$admin->ret("SELECT * FROM `customer` WHERE `cust_email`='$email'");
    
    $num=$stmt->rowCount();
    if($num>0){
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
  
        $dbpass=$row['cust_password'];
       
       if(password_verify($password,$dbpass)){
            $_SESSION['cid']=$row['cust_id'];
            echo "<script>alert('Login Successfull ');window.location='../index.php';</script>";
        }else{
            echo "<script>alert('You Have Entered Worng Password');window.location='../login.php';</script>";
        }
    }else{
        echo "<script>alert('You are Not a Valid User');window.location='../login.php';</script>";
    }
   
    
}
?>