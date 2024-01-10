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
                  <h4 class="card-title">Sales Report</h4>

                  <br>
                  <br>

                  <form class="forms-sample" method="POST" action="viewreport.php">

                    <div class="form-group">
                      <label for="exampleInputName1">Select starting date</label>
                      <input type="date" name="start_date" class="form-control" id="exampleInputName1" max=<?php echo date('Y-m-d') ?> required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Select ending date</label>
                      <input type="date" name="end_date" class="form-control" id="exampleInputName1" max=<?php echo date('Y-m-d') ?> required>
                    </div>


                    <button type="submit" name="view_report" class="btn btn-primary mr-2">view report</button>
                    <a href="viewreport.php" class="btn btn-light">Clear</a>
                  </form>
                </div>
              </div>
            </div>


            
          </div>
          <?php
            //showing order table
            if (isset($_POST['view_report'])) {

              $start_date = $_POST['start_date'];

              $end_date = $_POST['end_date'];
            ?>

              <div>
                <table class="table">
                  <tr>
                    <th>
                      Slno
                    </th>
                    <th>
                      Customer Name
                    </th>
                    <th>
                      Phone Number
                    </th>
                    <th>
                      Product Name
                    </th>

                    <th>
                      Date
                    </th>
                  </tr>
                  <?php
                  $count = 1;
                  $stmt = $admin->ret("SELECT * FROM `orders` INNER JOIN `customer` ON customer.cust_id=orders.cust_id INNER JOIN `product` ON product.pd_id=orders.pd_id WHERE  `od_date` between '$start_date' and '$end_date'");
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                    <tr>
                      <td>
                        <?php echo $count++ ?>
                      </td>

                      <td>
                        <?php echo $row['cust_name'] ?>
                      </td>
                      <td>
                        <?php echo $row['cust_phone'] ?>
                      </td>
                      <td>
                        <?php echo $row['pd_name'] ?>
                      </td>

                      <td>
                        <?php echo $row['od_date'] ?>
                      </td>
                    <?php } ?>
                    </tr>

                </table>
              <?php } ?>
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