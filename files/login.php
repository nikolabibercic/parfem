<?php 
    require '../objects.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
        
    //Ako korisnik vec ulogovan salje ga na index stranicu
    if(isset($_SESSION['user'])){
        header('Location: ../index.php');
    }else{
        $user->loginUser($email,$password);
    }
?>