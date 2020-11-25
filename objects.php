<?php
    session_start();

    require 'classes/Connection.php';
    require 'classes/ConnectionBuilder.php';
    require 'classes/User.php';
    require 'classes/Product.php';

    $conn = new Connection();
    $user = new User($conn->connect());
    $product = new Product($conn->connect());
?>