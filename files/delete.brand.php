<?php
    require '../objects.php';
    
    $brandId = $_POST['brandId'];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->deleteBrand($brandId);
        header("Location: ../views/admin.administration.products.view.php?brandDeleted={$product->brandDeleted}");
    }
?>
