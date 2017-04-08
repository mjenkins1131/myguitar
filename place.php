<?php

require_once('includes/head_imports_meta.php');
if (isset($_SERVER['HTTP_REFERER'])) {
    $refer = $_SERVER['HTTP_REFERER'];
    $len = strlen($refer);
    $start = $len - 12;
    $important = substr($refer, $start, $len);
    $orderitems = array();
    if ($important == "checkout.php") {
        $cartItems = $store->getCart();
        foreach ($cartItems as $key => $val) {
            $orderitems[] = $val;
        }
    }
    if ($session->isLoggedIn()) {
        $qry = new QueryBuilder();
        $qry->insert_into('Orders', array('CustomerID' => $session->getUid()));
        $qry->exec();
        $qry2 = new QueryBuilder();
        $qry2->select('OrderID')->from('Orders')->where('OrderDate', '=', "__NOW")->limit(1);
        $result = $qry2->get();
        $orderid = $result[0]['OrderID'];
        foreach ($orderitems as $key => $val) {
            $quantity = $val[3];
            $productid = $val[5];
            $discount = $val[6];
            $price = $val[0];
            $qry3 = new QueryBuilder();
            $qry3->insert_into('orderitems', array('OrderID' => $orderid, 'ProductID' => $productid, 'Quantity' => $quantity, 'ItemPrice' => $price, 'DiscountAmount' => $discount));
            $qry3->exec();
        }
        echo "Order successfully placed, cart cleared. You can return to the homepage here: <a href=\"index.php\">Click</a>";
        $store->emptyCart();
    }
}
?>