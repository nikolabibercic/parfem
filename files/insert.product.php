<?php
    require '../objects.php';

    $brandId = $_POST['brandId'];
    $categoryId = $_POST['categoryId'];
    $name = $_POST['name'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $purchasePrice = $_POST['purchasePrice'];
    $sellingPrice = $_POST['sellingPrice'];
    $otherInformation = $_POST['otherInformation'];

    $image1 = $_FILES["image1"];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $image1Path = $product->uploadPicture($image1);

        $product->insertProduct($brandId,$categoryId,$name,$size,$quantity,$purchasePrice,$sellingPrice,$otherInformation,$image1Path);
        header("Location: ../views/admin.administration.products.view.php?productInserted={$product->productInserted}");
    }
?>
