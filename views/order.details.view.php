<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php
    $user_id = $_SESSION['user']->user_id;
    // Provera da li je user ulogovan, ako nije salje na index.php stranicu
    if(!$user_id){
        header('Location: ../index.php');
    }

    // Ako je admin ili bloger ne moze na stranicu, salje ga na index.php stranicu
    if($user->checkUserAdmin($user_id) or $user->checkUserBloger($user_id)){
        header('Location: ../index.php'); 
    }

  //  $items = $cart->selectAllCartItems($user_id);

  //  $CartItemsSum = $cart->CartItemsSum($user_id)
?>

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Detalji pošiljke</h1>
    </div>
</div>

<br>

<div class="container">

</div>

<?php require '../partials/footer.php'; ?>

