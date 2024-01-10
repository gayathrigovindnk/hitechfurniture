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
                            <h2 style="color:white">Shop Furniture</h2>
                            <p style="color:white">Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
   
                                    <li>
                                        <a href="product.php">All</a>
                                        <?php
                                        $stmt1 = $admin->ret("SELECT COUNT(*) FROM `product`");
                                        $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

                                        $cnt = implode($row1);
                                        ?>
                                        <span>(<?php echo $cnt ?>)</span>
                                    </li>
                                    <?php
                                    $stmt = $admin->ret("SELECT * FROM `category`");
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $ctid = $row['cat_id'];
                                    ?>
                                        <li>
                                            <a href="product.php?catid=<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></a>
                                            <?php
                                            $stmt3 = $admin->ret("SELECT COUNT(*) FROM `product` WHERE `cat_id`='$ctid'");
                                            $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);

                                            $count = implode($row3);
                                            ?>
                                            <span>(<?php echo $count ?>)</span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </aside>

                    </div>
                </div>
                <div class="col-lg-9">

                    <div class="row align-items-center latest_product_inner">
                        <?php
                        if (isset($_GET['catid'])) {
                            $catid = $_GET['catid'];

                            $stmt2 = $admin->ret("SELECT * FROM `product` WHERE `cat_id`='$catid'");
                            while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single_product_item">
                                    <a href="viewproduct.php?pid=<?php echo $row2['pd_id'] ?>">
                                        <img src="admin/controller/<?php echo $row2['pd_image'] ?>" alt="" style="width:300px;height:200px;overflow-hidden:hidden;object-fit:cover"></a>
                                        <div class="single_product_text">
                                            <h4><?php echo $row2['pd_name'] ?></h4>
                                            <h3>₹<?php echo $row2['pd_price'] ?></h3>
                                            <form action="controller/cart.php" method="POST">
                                                <input type="hidden" name="pdid" value="<?php echo $row2['pd_id'] ?>">
                                                <input type="hidden" name="cqty" value="1">
                                                <?php
                                            if(!isset($_SESSION['cid'])){ ?>
                                                 <a href="login.php" class="btn btn-danger text-light">+ add to cart</a>
                                        <?php } else {
                                                ?>
                                                <input type="submit" name="addtocart" class="btn btn-danger" value="+ add to cart">
                                                <?php } ?>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php } else {
                            $stmt3 = $admin->ret("SELECT * FROM `product` ");
                            while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single_product_item">
                                        <a href="viewproduct.php?pid=<?php echo $row3['pd_id'] ?>">
                                        <img src="admin/controller/<?php echo $row3['pd_image'] ?>" alt="" style="width:300px;height:200px;overflow-hidden:hidden;object-fit:cover"></a>
                                        <div class="single_product_text">
                                            <h4><?php echo $row3['pd_name'] ?></h4>
                                            <h3>₹<?php echo $row3['pd_price'] ?></h3>
                                            <form action="controller/cart.php" method="POST">
                                                <input type="hidden" name="pdid" value="<?php echo $row3['pd_id'] ?>">
                                                <input type="hidden" name="cqty" value="1">
                                                <?php
                                            if(!isset($_SESSION['cid'])){ ?>
                                                 <a href="login.php" class="btn btn-danger text-light">+ add to cart</a>
                                        <?php } else {
                                                ?>
                                                <input type="submit" name="addtocart" class="btn btn-danger" value="+ add to cart">
                                                <?php } ?>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    <!-- product_list part start-->
    <!-- <section class="product_list best_seller">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Best Sellers <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        <div class="single_product_item">
                            <img src="img/product/product_1.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_2.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_3.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_4.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="img/product/product_5.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- product_list part end-->

    <!--::footer_part start::-->
    <?php
    include 'footer.php';
    ?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
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