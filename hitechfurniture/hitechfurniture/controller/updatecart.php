<?php
include '../config.php';
$admin=new Admin();

$uid=$_SESSION['cid'];
$cartid=$_GET['cartid'];
$qty=$_GET['qty'];

$stmt=$admin->cud("UPDATE `cart` SET `cart_qty`='$qty' WHERE `cart_id`= '$cartid'","saved");


?>


<div class="container" id="tablecart">
            <div class="cart_inner">
                <div class="table-responsive">
                <?php
            $stmt4 = $admin->ret("SELECT * FROM `cart` WHERE `cust_id`='$uid'");
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
                            $stmt = $admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pd_id=cart.pd_id WHERE `cust_id`='$uid'");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
                                            <input class="input-number" id="<?php echo $row['cart_id'] ?>" value="<?php echo $row['cart_qty'] ?>" type="text">
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
                        <a class="btn_1 checkout_btn_1" href="checkout.php">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>