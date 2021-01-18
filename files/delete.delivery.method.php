<?php
    require '../objects.php';
    
    $deliveryMethodId = $_POST['deliveryMethodId'];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->deleteDeliveryMethod($deliveryMethodId);
        header("Location: ../views/admin.delete.delivery.method.view.php?deliveryMethodDeleted={$product->deliveryMethodDeleted}");
    }
?>
