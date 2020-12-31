<?php
    require '../objects.php';
    
    $categoryId = $_POST['categoryId'];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->deleteCategory($categoryId);
        header("Location: ../views/admin.delete.category.view.php?categoryDeleted={$product->categoryDeleted}");
    }
?>
