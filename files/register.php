<?php
    require '../objects.php';
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Ako korisnik vec ulogovan salje ga na index stranicu
    if(isset($_SESSION['user'])){
        header('Location: ../index.php');
    }else{
        $user->registerUser($name,$email,$password);

        if($user->userRegistered){
            $user->loginUser($email,$password);
        }else{
            header("Location: ../views/register.view.php?userRegistered={$user->userRegistered}");
        }
    }
?>
