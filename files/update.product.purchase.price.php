<?php
    require '../objects.php';
    
    $productId = $_POST['productId'];
    $purchasePrice = $_POST['purchasePrice'];

    // Provera da li user ima admin ili bloger prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id) and !$user->checkUserBloger($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->updateProductPurchasePrice($productId,$purchasePrice);
        header("Location: ../views/admin.update.product.purchase.price.view.php?productPurchasePriceUpdated={$product->productPurchasePriceUpdated}");
    }
?>
