<?php
    require '../objects.php';

    $formUserId = $_POST['formUserId'];
    $roleId = $_POST['roleId'];


    // Provera da li user ima admin prava
    $userId = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($userId)){
        header('Location: ../index.php'); 
    }else{
        $user->insertRole($formUserId,$roleId);
        header("Location: ../views/admin.add.role.view.php?roleAdded={$user->roleAdded}");
    }
?>