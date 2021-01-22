<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php
    $user_id = $_SESSION['user']->user_id;
    // Provera da li je user ulogovan, ako nije salje na index.php stranicu
    if(!$user_id){
        header('Location: ../index.php');
    }

    // Ako je admin ili bloger ne moze na cart.view stranicu, salje ga na index.php stranicu
    if($user->checkUserAdmin($user_id) or $user->checkUserBloger($user_id)){
        header('Location: ../index.php'); 
    }

    $items = $cart->selectAllCartItems($user_id);

    $CartItemsSum = $cart->CartItemsSum($user_id)
?>

<?php
//Navbar
 $setting->navbar('Korpa');
?>

<br>

<div class="container">
    <div class="row">
        <div class="col-3">
        </div> 
        <div class="col-6">

            <!--Poruke nakon insert, update i delete akcija-->
            <?php if(isset($_GET['orderInserted']) && $_GET['orderInserted']==true): ?>
                <div class="alert alert-success" role="alert">Uspešno ste poručili!</div>
            <?php endif; ?>
            <?php if(isset($_GET['orderInserted']) && $_GET['orderInserted']==false): ?>
                <div class="alert alert-danger" role="alert">Poručivanje nije uspelo!</div>
            <?php endif; ?>
            
            <br>

            <h4 class="text-center">Nastavi pretragu parfema <a href="../index.php">ovde</a></h4>
            
            <br>
            
        </div>    
        <div class="col-3">
        </div>  
    </div>

    <br>
    <br>
</div>

<?php require '../partials/footer.php'; ?>

