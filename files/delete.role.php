<?php
    require '../objects.php';

    $userRoleId = $_POST['userRoleId'];

    // Provera da li user ima admin prava
    $userId = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($userId)){
        header('Location: ../index.php'); 
    }else{
        $user->deleteRole($userRoleId);
        header("Location: ../views/admin.delete.role.view.php?roleDeleted={$user->roleDeleted}");
    }
?>