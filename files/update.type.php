<?php
    require '../objects.php';
    
    $typeId = $_POST['typeId'];
    $typeNameNew = $_POST['typeNameNew'];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->updateType($typeId,$typeNameNew);
        header("Location: ../views/admin.administration.products.view.php?typeUpdated={$product->typeUpdated}");
    }
?>