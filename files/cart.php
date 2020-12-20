<?php
    require '../objects.php';
    
    $productId = $_GET['productId'];

    //Ako korisnik nije ulogovan salje ga na login stranicu
    if(!isset($_SESSION['user'])){
        header("Location: ../views/login.view.php");
    }else{
        $userId = $_SESSION['user']->user_id;
        $cart->insertItemIntoCart($productId,$userId);
        header("Location: ../views/cart.view.php?itemInserted={$cart->itemInserted}");
    }
?>