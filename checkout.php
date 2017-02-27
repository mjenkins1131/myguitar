<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <script>
        $(document).ready(function({
            simpleCart.each();  
        }));
    </script>
    <head>
        <?php require_once('includes/head_imports_meta.php') ?>
    </head>
    <body>
        <!--header-->
        <?php require_once('includes/header.php'); ?>
        <!-- grow -->
        <div class="grow">
            <div class="container">
                <h2>Checkout</h2>
            </div>
        </div>
        <!-- grow -->
        <div class="container">
            <div class="check">	 
                <div class="col-md-9 cart-items">
                    <?php
                    $cartItems = $session->getCart();
                    if(count($cartItems) < 1) {
                        echo "<font size=\"5\">No items in cart, check out our products in the top-left navbar (under cart total) and featured listings available on our home page!</font>";
                    }
                    foreach($cartItems as $key => $item) {
                    ?>
                    <div class="cart-header2">
                        <div class="cart-sec simpleCart_shelfItem">
                            <div class="cart-item cyc">
                                <img src="images/stock_product.jpg" class="img-responsive" alt=""/>
                            </div>
                            <div class="cart-item-info">
                                <h3><a href="#"><?php echo $item[1]; ?></a><span><?php echo $item[2]; ?></span></h3>
                                <ul class="qty">
                                    <li><p>Qty : <?php echo $item[3]; ?></p></li>
                                    <li><p><a href="removecart.php?all=true&prodid=<?php echo $key ?>">Remove all</a></p></li>
                                    <li><p>Remove x <form action="removecart.php" method="post"><input type="number" min="1" max="<?php echo $item[3]; ?>" name="amount" /><input type="hidden" name="prodid" value="<?php echo $key ?>" /><input type="submit" name="removex" /></form></p></li>
                                </ul>
                                <div class="delivery">
                                    <p>Service Charges : Free</p>
                                    <span>Delivered in 2-3 business days</span>
                                    <div class="clearfix"></div>
                                </div>	
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-md-3 cart-total">
                    <a class="continue" href="#">Continue to basket</a>
                    <div class="price-details">
                        <h3>Price Details</h3>
                        <span>Total</span>
                        <span class="total1"><?php echo $session->getCartTotal(); ?></span>
                        <span>Discount</span>
                        <span class="total1">---</span>
                        <span>Delivery Charges</span>
                        <span class="total1">Free</span>
                        <div class="clearfix"></div>				 
                    </div>	
                    <ul class="total_price">
                        <li class="last_price"> <h4>TOTAL</h4></li>	
                        <li class="last_price"><span><?php echo $session->getCartTotal(); ?></span></li>
                        <div class="clearfix"> </div>
                    </ul>


                    <div class="clearfix"></div>
                    <a class="order" href="#">Place Order</a>
                    <div class="total-item">
                        <h3>OPTIONS</h3>
                        <h4>COUPONS</h4>
                        <a class="cpns" href="#">Apply Coupons</a>
                        <p><a href="login.php">Log In</a> to use accounts - linked coupons</p>
                    </div>
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>


        <!--//content-->
        <?php require_once('includes/footer.php'); ?>
    </body>
</html>
