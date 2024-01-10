<?php
include 'config.php';
$admin = new Admin();
$cid = $_SESSION['cid'];


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
                            <h2 style="color:white">Cart Products</h2>
                            <p style="color:white">Home <span>-</span>Cart Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Cart Area =================-->
    <section class="cart_area padding_top">
        <div class="container" id="tablecart">
            <div class="cart_inner">
                <div class="table-responsive">
                <?php
            $stmt4 = $admin->ret("SELECT * FROM `cart` WHERE `cust_id`='$cid'");
            $num = $stmt4->rowCount();
            if ($num == 0) {
            ?>
                <h5 style="color:red;margin-left:500px">Your cart is empty!!</h5>
            <?php } else { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $grandtotal = 0;
                              $total = 0;
                            $stmt1 = $admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pd_id=cart.pd_id WHERE `cust_id`='$cid'");
                            while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                                
                                $qty = $row['cart_qty'];
                                $price = $row['pd_price'];

                                $total = $qty * $price;
                                $grandtotal = $grandtotal + $total;
                            ?>
                                <tr>
                                   
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="admin/controller/<?php echo $row['pd_image'] ?>" alt="" style="width:200px;" />
                                            </div>
                                            <div class="media-body">
                                                <p><?php echo $row['pd_name'] ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>₹<?php echo $row['pd_price'] ?></h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <button onclick="decrement(<?php echo $row['cart_id'] ?>)"><i class="ti-angle-down"></i> </button>
                                            <input class="input-number" id="<?php echo $row['cart_id']?>" value="<?php echo $row['cart_qty'] ?>" type="text">
                                            <button onclick="increment(<?php echo $row['pd_qty'] ?>,<?php echo $row['cart_id'] ?>)"> <i class="ti-angle-up"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>₹<?php echo $total ?></h5>
                                    </td>
                                    <td class="text-center align-middle px-0"><a href="controller/deletecart.php?cartid=<?php echo $row['cart_id'] ?>" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Grand Total</h5>
                                </td>
                                <td>
                                    <h5>₹<?php echo $grandtotal ?></h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="product.php">Continue Shopping</a>
                        <?php
                            $stmt6=$admin->ret("SELECT * FROM `cart` WHERE `cust_id`='$cid'");
                            $num6=$stmt6->rowCount();
                            if($num6>0){ ?>
<a class="btn_1 checkout_btn_1" href="checkout.php">Proceed to checkout</a>
                         <?php   }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

   
    <?php
    include 'footer.php';
    ?>
   



    <script>
        function increment(stock, cartid) {
            var qty = document.getElementById(cartid).value;
            qty = parseInt(qty) + 1;

            if (qty > stock) {

                alert('out of stock');
            } else {
                document.getElementById(cartid).value = qty;
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        document.getElementById("tablecart").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "controller/updatecart.php?cartid=" + cartid + '&qty=' + qty, true);
                xmlhttp.send();

            }

        }

        function decrement(cartid) {
            var qty = document.getElementById(cartid).value;
            qty = parseInt(qty) - 1;
            if (qty > 0) {

                document.getElementById(cartid).value = qty;
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        document.getElementById("tablecart").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "controller/updatecart.php?cartid=" + cartid + '&qty=' + qty, true);
                xmlhttp.send();

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