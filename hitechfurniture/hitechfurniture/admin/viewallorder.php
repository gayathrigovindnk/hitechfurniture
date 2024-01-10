<?php
include 'config.php';
$admin = new Admin();


$unid = $_GET['unid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HitechFurniture</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <!-- <link rel="shortcut icon" href="images/favicon.png" /> -->
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php
        include 'navbar.php';
        ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <!-- partial:partials/_sidebar.html -->
            <?php
            include 'sidebar.php';
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">


                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">View Order Details</h4>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Slno
                                                    </th>
                                                    <th>
                                                        Category
                                                    </th>
                                                    <th>
                                                        Product Name
                                                    </th>
                                                    <th>
                                                        Image
                                                    </th>
                                                    <th>
                                                        Quantity
                                                    </th>
                                                    <th>
                                                        Amount
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 1;
                                                $stmt = $admin->ret("SELECT * FROM `orders` INNER JOIN `product` ON product.pd_id=orders.pd_id INNER JOIN `category` ON category.cat_id=product.cat_id WHERE `unid`='$unid' ");
                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            echo $count++
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['cat_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['pd_name'] ?>
                                                        </td>
                                                        <td class="py-1">
                                                            <img src="controller/<?php echo $row['pd_image'] ?>" alt="image" style="width: 130px;height:130px" />
                                                        </td>
                                                        <td>
                                                            <?php echo $row['od_qty'] ?>
                                                        </td>
                                                        <td>
                                                            ₹<?php echo $row['total'] ?>
                                                        </td>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">View Shipping Details</h4>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Slno
                                                    </th>
                                                    <th>
                                                        First Name
                                                    </th>
                                                    <th>
                                                        Last Name
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                  
                                                    <th>
                                                        Address
                                                    </th>
                                                   
                                                    <th>
                                                        Pincode
                                                    </th>
<th>

</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$count1=1;
$stmt2=$admin->ret("SELECT * FROM `shipping` WHERE `unid`='$unid'");
while($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){
                                                ?>
                                               
                                                    <tr>
                                                        <td>
                                                            <?php echo $count1++ ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $row2['fname'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row2['lname'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row2['email'] ?>
                                                        </td>
                                                       
                                                        <td>
                                                            <?php echo $row2['address'] ?>
                                                        </td>
                                                       
                                                        <td>
                                                            <?php echo $row2['zip'] ?>
                                                        </td>


                                                    </tr>
                                                    <?php } ?>
                                             


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>