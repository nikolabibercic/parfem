<?php
    require '../objects.php';
    
    $categoryName = $_POST['categoryName'];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $product->insertCategory($categoryName);
        header("Location: ../views/admin.create.category.view.php?categoryInserted={$product->categoryInserted}");
    }
?>
