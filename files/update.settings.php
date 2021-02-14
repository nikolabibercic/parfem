<?php
    require '../objects.php';
    
    $settingId = $_POST['settingId'];
    $settingValue = $_POST['settingValue'];
    $settingValue2 = $_POST['settingValue2'];

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }else{
        $setting->updateSetting($settingId,$settingValue,$settingValue2);
        header("Location: ../views/admin.update.settings.view.php?settingUpdated={$setting->settingUpdated}");
    }
?>