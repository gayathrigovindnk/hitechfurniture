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
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
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
         
          
       
            <div class="col-md-6 grid-margin ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Product Category</h4>
                 <form action="controller/addproduct.php" method="POST">
                  <div class="form-group">
                    <label>Enter Category</label>
                    <input type="text" name="category" class="form-control form-control-lg" placeholder="Category" required>
                  </div>
                  <div>
                    <input type="submit" name="cat" value="Add" class="btn btn-primary" style="width:100px">
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Product</h4>
                  <form action="controller/addproduct.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Category</label>
                    <select name="catg" class="form-control form-control-lg" id="exampleFormControlSelect1" required>
                      <option disabled selected hidden value="">Select Category</option>
                      <?php
                      $stmt=$admin->ret("SELECT * FROM `category`");
                      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                        <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>

                     <?php }
                      ?>
                     
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Enter Product Name</label>
                    <input type="text" name="product" class="form-control form-control-lg" pattern="[A-Za-z]+" title="Only alphabets are allowed." placeholder="Product Name" required>
                  </div>
                  <div class="form-group">
                    <label>Add Product Image</label>
                    <input type="file" name="image" class="form-control form-control-lg" required>
                  </div>
                  <div class="form-group">
                    <label>Add Product Description</label>
                    <textarea type="text" name="about" class="form-control form-control-lg" placeholder="Description" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Enter Product Price</label>
                    <input type="number" name="price" class="form-control form-control-lg" placeholder="Product Price" required>
                  </div>
                  <div class="form-group">
                    <label>Enter Product Gst</label>
                    <input type="number" name="gst" class="form-control form-control-lg" placeholder="Product Gst" required>
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="qty" class="form-control form-control-lg" placeholder="Product Quantity" required>
                  </div>
                  <div>
                    <input type="submit" name="addproduct" value="Add" class="btn btn-primary" style="width:100px">
                  </div>
                  </form>
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
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
