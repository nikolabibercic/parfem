<?php
    require '../objects.php';
    
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    // Provera da li user ima admin ili bloger prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id) and !$user->checkUserBloger($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->updateProductQuantity($productId,$quantity);
        header("Location: ../views/admin.update.product.quantity.view.php?productQuantityUpdated={$product->productQuantityUpdated}");
    }
?>
