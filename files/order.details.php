<?php
    require '../objects.php';

    //Ako korisnik nije ulogovan salje ga na login stranicu
    if(!isset($_SESSION['user'])){
        header("Location: ../views/login.view.php");
    }else{
        $userId = $_SESSION['user']->user_id;
        $tran->insertTransaction($userId);

        header("Location: ../views/order.details.view.php");
    }
?>