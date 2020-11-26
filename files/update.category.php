<?php
    require '../objects.php';
    
    $categoryId = $_POST['categoryId'];
    $categoryNameNew = $_POST['categoryNameNew'];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->updateCategory($categoryId,$categoryNameNew);
        header("Location: ../views/admin.administration.products.view.php?categoryUpdated={$product->categoryUpdated}");
    }
?>
