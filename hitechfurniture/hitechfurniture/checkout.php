<?php
include 'config.php';
$admin = new Admin();
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
  <!-- nice select CSS -->
  <link rel="stylesheet" href="css/nice-select.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/price_rangs.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!--::header part start::-->
  <?php

  include 'navbar.php';
  ?>
  <!-- Header part end-->

  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Product Checkout</h2>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Checkout Area =================-->
  <section class="checkout_area padding_top">
  <form class="row contact_form" action="controller/checkout.php" method="post">
    <div class="container">

      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>

            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required />

            </div>
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" required />

            </div>

            <div class="col-md-6 form-group p_star">
              <input type="tel" class="form-control" id="pnumber" name="phone" placeholder="Phone number" pattern="[0-9]{10}" title="Please Enter Valid Number" required />

            </div>
            <div class="col-md-6 form-group p_star">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required />

            </div>
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="country" name="country" placeholder="Country" required />

            </div>
            <div class="col-md-6 form-group p_star">
              <input type="text" class="form-control" id="state" name="state" placeholder="State" required />

            </div>

            <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="address" name="address" placeholder="Address" required />

            </div>


            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" maxlength="6" required />
            </div>



          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                    <span>Total</span>
                  </a>
                </li>

                <?php
                $total = 0;
                $gtotal = 0;
                $stmt = $admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pd_id=cart.pd_id WHERE `cust_id`='$cid'");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $qty = $row['cart_qty'];
                  $price = $row['pd_price'];
                  $total = $qty * $price;
                  $gtotal = $gtotal + $total;
                ?>
                  <li>
                    <a href="#"><?php echo $row['pd_name'] ?>
                      <span class="middle">x<?php echo $qty ?></span>
                      <span class="last">₹<?php echo $total ?></span>
                    </a>
                  </li>
                <?php } ?>
              </ul>
              <ul class="list list_2">

                <li>
                  <a href="#">Total
                    <span>₹<?php echo $gtotal ?></span>
                  </a>
                </li>
              </ul>


              <div class="payment-check">
                <div class="card-info  ">

                  <div>
                    <input type="radio" name="payment_method" value="cash" id="cash" onclick="cardform(this.value)" style="width: 14px;" required>&nbsp;
                    <label style="font-family: 'Open Sans', sans-serif;">Cash On Delivery</label>


                    <div style="display:none;" id="cash_div">
                      <div class="row">

                      </div>
                    </div>
                  </div>
                  <br>


                  <input type="radio" name="payment_method" value="upi" id="upi" onclick="cardform(this.value)" style="width: 14px;" required>&nbsp;
                  <label style="font-family: 'Open Sans', sans-serif;">UPI / Netbanking</label>
                  <div style="display:none;" id="upi_div">

                    <div class="Pement">
                      <div class="form-box" style="display: flex;flex-direction:column">
                        <label><b> Scan and Pay</b></label>
                        <img src="img2/qrcode2.jpg" height="180px" width="180px">

                      </div>
                      <br>
                      <div class="form-box" style="display: flex;flex-direction:column">
                        <form action="controller/checkout.php" method="post">
                          <label>Transaction Id</label>
                          <input type="text" name="transaction" id="trid" class="form-control" placeholder="0000 0000 0000 0000 " style="width: 200px;" minlength="16" maxlength="16" required>
                      </div>
                    </div>


                  </div><br>
                  <button type="submit" name="checkout" class="btn_3">Proceed to Pay</button>
                </div>
              </div>


            </div>
          </div>
        </div>

      </div>
    </div>
  </form>
  </section>
  <!--================End Checkout Area =================-->

  <!--::footer_part start::-->
  <?php
  include 'footer.php';
  ?>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <!-- jquery -->

  <script>
    function cardform(myvalue) {

      if (myvalue == 'cash') { //radio button id
        document.getElementById('cash_div').style.display = 'block'; //div id
        document.getElementById('upi_div').style.display = 'none';
        document.getElementById('trid').removeAttribute('required');


      } else if (myvalue == 'upi') {

        document.getElementById('upi_div').style.display = 'block';
        document.getElementById('cash_div').style.display = 'none';
        document.getElementById('trid').setAttribute('required', '');
      }
    }


    
  </script>

  <script src="js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="js/swiper.min.js"></script>
  <!-- swiper js -->
  <script src="js/masonry.pkgd.js"></script>
  <!-- particles js -->
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="js/slick.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/price_rangs.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
</body>

</html>