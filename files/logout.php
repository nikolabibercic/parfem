<?php

    require '../objects.php';
    
    session_destroy();

    header('Location: ../index.php');

?>