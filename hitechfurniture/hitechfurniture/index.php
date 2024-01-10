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
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <?php
    include 'navbar.php';
    ?>
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12" style="margin-top: -130px;">
                    <div class="banner_slider owl-carousel">
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Wood & Cloth
                                                Sofa</h1>

                                            <a href="product.php" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img2/homebg1.jpg" alt="" style="width:700px;height:500px">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Cloth & Wood
                                                Sofa</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="product.php" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img2/homebg2.jpg" alt="" style="width:700px;height:500px">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Wood & Cloth
                                                Sofa</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="product.php" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img2/homebg3.jpg" alt="" style="width:700px;height:500px">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="slider-counter"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Featured Category</h2>
                    </div>
                </div>
            </div>
            <div style="display:flex;flex-wrap:wrap;margin-left:250px">
                <?php
                $stmt = $admin->ret("SELECT * FROM `category`");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                    <div class="col-lg-7 col-sm-6">
                        <div class="single_feature_post_text" style="height:200px;width:600px;padding:70px;background: #DDE6ED;border-radius:10px">
                            <div style="margin-left: 100px;">
                                <p>Premium Quality Products For </p>
                                <h3><?php echo $row['cat_name'] ?></h3>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- product_list start-->

    <!-- product_list part start-->



    <!-- product_list part start-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section_tittle text-center">
                            <h2>Best Selling Product</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">

                    <div class="row align-items-center latest_product_inner">
                        <?php


                        $stmt3 = $admin->ret("SELECT product.pd_id,product.pd_name,product.pd_image,product.pd_price, count(od_id) FROM `orders` INNER JOIN `product` ON product.pd_id=orders.pd_id GROUP BY product.pd_id ORDER BY count(od_id) DESC");
                        while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>

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
                                            <input type="submit" name="addtocart" class="btn btn-danger" value="+ add to cart">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
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
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>