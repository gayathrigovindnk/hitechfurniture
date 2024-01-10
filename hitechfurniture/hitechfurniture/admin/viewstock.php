<?php
include 'config.php';
$admin = new Admin();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HitechFurniture</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
                                    <h4 class="card-title">View Product Stocks</h4>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Slno
                                                    </th>
                                                    <th>
                                                        Image
                                                    </th>
                                                    <th>
                                                        Category
                                                    </th>
                                                    <th>
                                                        Product Name
                                                    </th>
                                                    <th>
                                                        Quantity
                                                    </th>
                                                    <th>
                                                        Status
                                                    </th>

                                                    <th>
                                                        Date
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 1;
                                                $stmt = $admin->ret("SELECT * FROM `product` INNER JOIN `category` ON category.cat_id=product.cat_id");
                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                                                    <tr>
                                                        <td>
                                                            <?php echo $count++ ?>
                                                        </td>
                                                        <td class="py-1">
                                                            <img src="controller/<?php echo $row['pd_image'] ?>" alt="image" style="width: 100px;height:100px" />
                                                        </td>
                                                        <td>
                                                            <?php echo $row['cat_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['pd_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['pd_qty'] ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['pd_qty'] <= 0) { ?>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $row['pd_id'] ?>">
                                                                    Restock
                                                                </button>
                                                            <?php  } else { ?>
                                                                <a class="btn btn-success">In stock</a>
                                                            <?php }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['pd_date'] ?>
                                                        </td>
                                                        <td>
                                                            <a href="controller/deleteproduct.php?pid=<?php echo $row['pd_id'] ?>" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash" style="font-size: 25px;color:red;"></i></a>
                                                        </td>

                                                    </tr>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal<?php echo $row['pd_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Restock Product</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="controller/addstock.php" method="POST">
                                                                    <div class="form-group">
                                                                        <label for="">Product</label>
                                                                        <input type="text" class="form-control" value="<?php echo $row['pd_name'] ?>" readonly>
                                                                        <input type="hidden" name="pdid" class="form-control" value="<?php echo $row['pd_id'] ?>" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Product Quantity</label>
                                                                        <input type="number" name="qty" class="form-control" value="<?php echo $row['pd_qty'] ?>" required>
                                                                    </div>
                                                                
                                                                </div>
                                                                <div class="modal-footer">
                                                                    
                                                                    <button type="type" name="add" class="btn btn-primary">Add</button>
                                                                </div>
                                                                </form>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
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