<?php
include 'config.php';
$admin = new Admin();

$pid = $_GET['pid'];

$stmt = $admin->ret("SELECT * FROM `product` INNER JOIN `category` ON category.cat_id=product.cat_id WHERE `pd_id`='$pid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HitechFurniture</title>
  <!-- <link rel="icon" href="img/favicon.png"> -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- animate CSS -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/lightslider.min.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!--::header part start::-->
  <?php
  include 'navbar.php';
  ?>
  <!-- Header part end-->

  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>View Product</h2>
              <p>Home <span>-</span> View Product</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->
  <!--================End Home Banner Area =================-->

  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner justify-content-between">
        <div class="col-lg-7 col-xl-7">
          <div class="product_slider_img">
            <div id="vertical">
              <div data-thumb="img/product/single-product/product_1.png">
                <img src="admin/controller/<?php echo $row['pd_image'] ?>" />
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xl-4">
          <div class="s_product_text">

            <h3><?php echo $row['pd_name'] ?></h3>
            <h2>₹<?php echo $row['pd_price'] ?></h2>
            <ul class="list">
              <li>
                <a class="active" href="#">
                  <span>Category</span> : <?php echo $row['cat_name'] ?></a>
              </li>
              <li>
                <!-- <a href="#"> <span>Availibility</span> : In Stock</a> -->
              </li>
            </ul>
            <p>
              <?php echo $row['pd_about'] ?>
            </p>
            <div class="card_area d-flex justify-content-between align-items-center">

              <form action="controller/cart.php" method="POST">
                <input type="hidden" name="pdid" value="<?php echo $row['pd_id'] ?>">
                <input type="hidden" name="cqty" value="1">

                <?php
                if (!isset($_SESSION['cid'])) { ?>
                  <a href="login.php" class="btn btn-danger text-light">+ add to cart</a>
                <?php } else {
                ?>
                  <input type="submit" name="addtocart" class="btn btn-danger" value="+ add to cart">
                <?php } ?>


                </ul>
              </form>

              
              <button class="likes heart" id="like" data-type="like" onclick="like(<?php echo $row['pd_id'] ?>)" style="background: none;border:none;color:red;font-size:20px">❤<span id="likecount<?php echo $pid ?>" style="margin-left: 8px;">
                                                    <?php

$stmt5 = $admin->ret("SELECT * FROM `feedback` WHERE `type`='liked' AND `pd_id`='$pid'");
$num1=$stmt5->rowCount();
                                                    echo $num1; ?>&nbsp;Likes
                                                </span></button>





            </div>
          </div>
        </div>
      </div>
      <div style="margin-top: 100px;">
        <h2>Give Us Your Feedback</h2>
        <form action="controller/feedback.php" method="POST">
          <input type="hidden" name="pdid" value="<?php echo $pid ?>">
          <textarea name="feed" id="" class="form-control" placeholder="Write.." required></textarea>
          <?php
                if (!isset($_SESSION['cid'])) { ?>
          <a href="login.php" class="btn_3"  style="margin-top: 30px;">Submit</a>
          <?php } else {
                ?>
                <button class="btn_3" type="submit" name="send" style="margin-top: 30px;">Submit</button>
                <?php } ?>
        </form>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->





  <!--::footer_part start::-->
  <?php
  include 'footer.php';
  ?>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
<script>
  function like(pid) {

xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("likecount" + pid).innerHTML = xmlhttp.responseText;
    }

}
xmlhttp.open("GET", "controller/like.php?pid=" + pid, true);
xmlhttp.send();
}

</script>
  <!-- jquery -->
  <script src="js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="js/lightslider.min.js"></script>
  <!-- swiper js -->
  <script src="js/masonry.pkgd.js"></script>
  <!-- particles js -->
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="js/slick.min.js"></script>
  <script src="js/swiper.jquery.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/stellar.js"></script>
  <!-- custom js -->
  <script src="js/theme.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>