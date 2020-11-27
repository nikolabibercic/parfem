<?php
    require '../objects.php';

    $brandName = $_POST['brandName'];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->insertBrand($brandName);
        header("Location: ../views/admin.administration.products.view.php?brandInserted={$product->brandInserted}");
    }
?>
