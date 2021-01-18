<?php
    require '../objects.php';
    
    $deliveryMethodId = $_POST['deliveryMethodId'];
    $deliveryMethodNameNew = $_POST['deliveryMethodNameNew'];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->updateDeliveryMethodName($deliveryMethodId,$deliveryMethodNameNew);
        header("Location: ../views/admin.update.delivery.method.name.view.php?deliveryMethodNameUpdated={$product->deliveryMethodNameUpdated}");
    }
?>