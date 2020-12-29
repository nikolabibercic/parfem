<?php
    session_start();

    require 'classes/Connection.php';
    require 'classes/ConnectionBuilder.php';
    require 'classes/User.php';
    require 'classes/Product.php';
    require 'classes/Cart.php';
    require 'classes/Transaction.php';
    require 'classes/Order.php';
    require 'classes/Pagination.php';

    $conn = new Connection();
    $user = new User($conn->connect());
    $product = new Product($conn->connect());
    $cart = new Cart($conn->connect());
    $tran = new Transaction($conn->connect());
    $order = new Order($conn->connect());
    $pagination = new Pagionation($conn->connect());
?>