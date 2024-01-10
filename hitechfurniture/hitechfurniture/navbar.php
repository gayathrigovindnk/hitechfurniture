<?php

$admin = new Admin();

?>

<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php">
                        <h2><b> HiTech-Furniture</b></h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="product.php">Products</a>
                            </li>
                            <?php
                            if (!isset($_SESSION['cid'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Cart</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="login.php">Status</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="cart.php">Cart</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="orderstatus.php">Status</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                            <?php }  ?>

                            <li style="margin-top: 30px;">
                            <a href="profile.php"><i class="fas fa-user" style="font-size:23px" title="My profile"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">

                        <div class="dropdown cart">
                            <a href="cart.php" aria-haspopup="true" aria-expanded="false">
                            <?php
                                    if(!isset($_SESSION['cid'])){ 
                                         ?>
                                         <a href="login.php"> <i class="fas fa-cart-plus"></i></a>
                               <?php } else { 
                                
                                $cid = $_SESSION['cid']; ?>
                                <i class="fas fa-cart-plus">
                                   <?php
                                    $stmt2 = $admin->ret("SELECT COUNT(*) FROM `cart` WHERE `cust_id`='$cid'");
                                    $row1 = $stmt2->fetch(PDO::FETCH_ASSOC);
                                    $qty = implode($row1); ?>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
                                        <?php echo $qty ?></span>
                                    
                                    </i>
                                    <?php } ?>
                            </a>
                        </div>
                        
                    </div>
                   
                </nav>
            </div>
        </div>
    </div>

</header>