<?php
    require '../objects.php';
    
    $deliveryMethodId = $_POST['deliveryMethodId'];
    $deliveryMethodPriceNew = $_POST['deliveryMethodPriceNew'];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->updateDeliveryMethodPrice($deliveryMethodId,$deliveryMethodPriceNew);
        header("Location: ../views/admin.update.delivery.method.price.view.php?deliveryMethodPriceUpdated={$product->deliveryMethodPriceUpdated}");
    }
?>