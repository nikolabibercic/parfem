<?php
    require '../objects.php';
    
    $cartItemId = $_GET['cartItemId'];

    //Ako korisnik nije ulogovan salje ga na index stranicu
    if(!isset($_SESSION['user'])){
        header('Location: ../index.php');
    }else{
        $userId = $_SESSION['user']->user_id;
        $cart->cartItemDisabled($cartItemId,$userId);
        header("Location: ../views/cart.view.php?cartItemDisabled={$cart->cartItemDisabled}");
    }
?>