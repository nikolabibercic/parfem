<?php
    require '../objects.php';

    $deliveryMethodName = $_POST['deliveryMethodName'];
    $price = $_POST['price'];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->insertDeliveryMethod($deliveryMethodName,$price);
        header("Location: ../views/admin.create.delivery.method.view.php?deliveryMethodInserted={$product->deliveryMethodInserted}");
    }
?>
