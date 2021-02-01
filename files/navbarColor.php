<?php

    require '../objects.php';

    $navbarTextColor = $setting->selectSettingValue(22);

    echo json_encode($navbarTextColor);

?>