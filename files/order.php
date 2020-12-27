<?php
    require '../objects.php';
    
    $userName = $_POST['userName'];
    $userSurname = $_POST['userSurname'];
    $userAddress = $_POST['userAddress'];
    $userZipCode = $_POST['userZipCode'];
    $userCity = $_POST['userCity'];
    $deliveryMethodId = $_POST['deliveryMethodId'];
    $userMunicipality = $_POST['userMunicipality'];

    

    //Ako korisnik nije ulogovan salje ga na login stranicu
    if(!isset($_SESSION['user'])){
        header("Location: ../views/login.view.php");
    }else{
        $userId = $_SESSION['user']->user_id;

        $maxUserTranId = $tran->selectMaxUserTransaction($userId); //ovde kupim poslednju nekompletiranu trasakciju usera
        
        $tran->updateUserTranStatus($maxUserTranId[0]->transaction_id); //ovde radim update poslednje nekompletirane transakcije u status kompletirano
        
        $tran->insertUserCartItemsTransactions($userId,$maxUserTranId[0]->transaction_id); //ovde radim import itemsa i id transakcije u tabelu cart_items_transactions

        $tran->updateUserCartItemStatus($userId); //ovde radim update statusa u tabeli cart_items u Ordered

        $order->insertOrder($maxUserTranId[0]->transaction_id,$userName,$userSurname,$userAddress,$userZipCode,$userCity,$userMunicipality,$deliveryMethodId); //u tabelu orders insertujem podatke o posiljci i transakciji

        header("Location: ../views/successfully.ordered.view.php?orderInserted={$order->orderInserted}");
    }
?>