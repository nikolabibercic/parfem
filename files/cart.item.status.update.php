<?php
    require '../objects.php';

    $cartItemId = $_GET['cartItemId'];
    $transactionId = $_GET['transactionId'];


    // Provera da li user ima admin ili bloger prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id) and !$user->checkUserBloger($user_id)){
        header('Location: ../index.php'); 
    }else{
        $cart->updateCartItemStatus($cartItemId);
        header("Location: ../views/admin.order.details.view.php?cartItemStatusChanged={$cart->cartItemStatusChanged}&transactionId={$transactionId}");
    }
?>