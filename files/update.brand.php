<?php
    require '../objects.php';
    
    $brandId = $_POST['brandId'];
    $brandNameNew = $_POST['brandNameNew'];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->updateBrand($brandId,$brandNameNew);
        header("Location: ../views/admin.administration.products.view.php?brandUpdated={$product->brandUpdated}");
    }
?>