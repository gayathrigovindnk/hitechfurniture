<?php
include '../config.php';
$admin=new Admin();

if(isset($_POST['register'])){

    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];


    $target="upload/";
	$image=$target.basename($_FILES['img']['name']);
	move_uploaded_file($_FILES['img']['tmp_name'], $image);

    $stmt=$admin->ret("SELECT * FROM `customer` WHERE `cust_email`='$email'");
    $num=$stmt->rowCount();

    if($num>0){
        echo "<script>alert('Email already exist');
        window.location='../register.php';
        </script>";

    }else{
        if($password==$repassword){
            $pass=password_hash($password,PASSWORD_BCRYPT);

            $stmt2=$admin->cud("INSERT INTO `customer`(`cust_name`,`cust_email`,`cust_phone`,`cust_password`,`cust_img`,`cust_date`)VALUES('$name','$email','$phone','$pass','$image',now())","saved");
            if($stmt2){
            echo "<script>alert('Registered Successfully');
            window.location='../login.php';
            </script>";
            } else {
                echo "<script>alert('Something went wrong!!,please try again.');
                window.location='../register.php';
                </script>";
            }
        }else{
            echo "<script>alert('Password did not match,please try again.');
            window.location='../register.php';
            </script>";
        }

        }
        
    }

?>