<?php
    require '../objects.php';

    $productId = $_POST['productId'];
    $productStatusId = $_POST['productStatusId'];


    // Provera da li user ima admin ili bloger prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id) and !$user->checkUserBloger($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->updateProductStatus($productId,$productStatusId);
        header("Location: ../views/admin.change.product.status.view.php?productStatusChanged={$product->productStatusChanged}");
    }
?>