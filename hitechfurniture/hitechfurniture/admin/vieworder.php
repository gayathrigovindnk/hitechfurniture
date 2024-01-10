<?php
include 'config.php';
$admin=new Admin();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HitechFurniture</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                            <h6>Slno</h6>
                          </th>
                          <th>
                            <h6>Customer Name</h6>
                          </th>
                          <th>
                            <h6>Email Id</h6>
                          </th>
                          <th>
                            <h6>Phone Number</h6>
                          </th>
                          <th>
                            View All
                          </th>
                         
                          <th>
                            <h6>Status</h6>
                          </th>
                          <th>
                            <h6>Change Status</h6>
                          </th>
                          <th>
                            <h6>Date</h6>
                          </th>
                          <th>
                            <h6>Action</h6>
                          </th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $count = 1;
                        $pos = 0;
                        $stmt = $admin->ret("SELECT * FROM `orders` INNER JOIN `product` ON product.pd_id=orders.pd_id INNER JOIN `customer` ON customer.cust_id=orders.cust_id ORDER BY `od_id` DESC");
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
                              <?php echo $row['cust_email'] ?>
                            </td>
                            <td>
                              <?php echo $row['cust_phone'] ?>
                            </td>
                            <td>
                            <a href="viewallorder.php?unid=<?php echo $row['unid'] ?>"><i class="fa fa-eye" style="font-size: 25px;"></i></a>
                          </td>
                           
                            <td>
                            <?php
                            if($row['od_status']=='cancelled'){ ?>
                                 <p style="color:red">Cancelled </p>
                           <?php } else {
                            echo $row['od_status'];
                            } ?>
                            </td>

                            <td>
                            <?php
                            if($row['od_status']=='cancelled'){ ?>
                                 <p style="color:red"> Oreder Cancelled </p>
                           <?php } else {
                            ?>
                              <select name="status" onchange="changestatus(<?php echo $row['od_id']; ?>,<?php echo $pos; ?>)" id="">
                                <option value="">Change Status</option>
                                <option value="Picked by courier">Picked by courier</option>
                                <option value="On the way">On the way</option>
                                <option value="Ready for Delivery">Ready for Delivery</option>
                              </select>
<?php $pos++; } ?>
                            </td>


                            <td>
                              <?php echo $row['od_date'] ?>
                            </td>
                            <td>
                              <a href="controller/deleteorder.php?oid=<?php echo $row['od_id'] ?>" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash" style="font-size: 25px;color:red;"></i></a>
                            </td>


                          </tr>
                        <?php 
                        } ?>
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


  <script>
    function changestatus(odid, pos) {

      var status = document.getElementsByName("status")[pos].value;
      window.location.href = "controller/changestatus.php?odid=" + odid + "&orderstatus=" + status;

    }
    </script>
  
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
