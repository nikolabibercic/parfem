<?php
    require '../objects.php';
    
    $productId = $_POST['productId'];
    $sellingPrice = $_POST['sellingPrice'];

    // Provera da li user ima admin ili bloger prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id) and !$user->checkUserBloger($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->updateProductSellingPrice($productId,$sellingPrice);
        header("Location: ../views/admin.update.product.selling.price.view.php?productSellingPriceUpdated={$product->productSellingPriceUpdated}");
    }
?>
