<?php
include 'config.php';
$admin=new Admin();

$cid=$_SESSION['cid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HitechFurniture</title>
    <link rel="stylesheet" href="status.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    
<?php
include 'navbar.php';
?>


<section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2 style="color:white">Order Status</h2>
                            <p style="color:white">Home <span>-</span> Status</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <h3 style="text-align: center;">Order Status</h3>
<div class="container">
 
    <?php
    $stmt=$admin->ret("SELECT * FROM `orders` INNER JOIN `product` ON product.pd_id=orders.pd_id INNER JOIN `category` ON category.cat_id=product.cat_id  WHERE `cust_id`='$cid'  ORDER BY `od_id` DESC");
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $uid=$row['unid'];
    ?>
    <article class="card" style="margin-bottom: 20px;border:1px solid red">
        <header class="card-header" style="background: #95aaaa;"> My Orders / Tracking </header>
        <div class="card-body" >
        <div style="display: flex;">
            <h6>Order Date:  <?php echo $row['od_date'] ?></h6>

            <?php if($row['od_status']=='cancelled'){ ?>
                <button class="btn btn-danger" style="margin-left: 700px;">Order Cancelled</button>
            <?php } else { ?>
            <a href="controller/cancelorder.php?odid=<?php echo $row['od_id'] ?>" class="btn btn-warning" style="margin-left: 700px;">Cancel Order</a>
           <?php } ?>
           </div>
            <?php
                if($row['od_status']=='ordered'){
            ?>
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
            </div>
            <?php } else if($row['od_status']=='Picked by courier'){ ?>
                <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
            </div>
            <?php } else if($row['od_status']=='On the way'){ ?>
                <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
            </div>
            <?php } else if($row['od_status']=='Ready for Delivery'){ ?>
                <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
               
            </div>
            <?php } ?>
           


            <hr>
            <ul class="row">
          
                <li class="col-md-4">
                   
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="admin/controller/<?php echo $row['pd_image'] ?>" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title"><?php echo $row['cat_name'] ." ".  $row['pd_name'] ?> <br>Qty: <?php echo $row['od_qty'] ?></p> <span class="text-muted">₹<?php echo $row['total'] ?></span>
                        </figcaption>
                    </figure>
                  
                </li>
            
              
                
            </ul>
            <hr>
           
        </div>
    </article>
    <?php } ?>
</div>

<?php
include 'footer.php';
?>

<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>