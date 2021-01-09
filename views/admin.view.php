<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php

    // Provera da li user ima admin ili bloger prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id) and !$user->checkUserBloger($user_id)){
        header('Location: user.view.php'); 
    }
?>

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Admin stranica</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row justify-content-center">

        <div class="col-3">
            <?php if($user->checkUserAdmin($user_id)): ?>
                <button type="button" class="btn btn-danger"><a href="admin.create.category.view.php" style="color:white; text-decoration: none;">Kreiranje kategorije</a></button>
            <?php endif; ?>
        </div>  

        <div class="col-3">
            <?php if($user->checkUserAdmin($user_id)): ?>
                <button type="button" class="btn btn-danger"><a href="admin.delete.category.view.php" style="color:white; text-decoration: none;">Brisanje kategorije</a></button>
            <?php endif; ?>
        </div>   

        <div class="col-3">
            <?php if($user->checkUserAdmin($user_id)): ?>
                <button type="button" class="btn btn-danger"><a href="admin.update.category.view.php" style="color:white; text-decoration: none;">Izmena kategorije</a></button>
            <?php endif; ?>
        </div>   

        <div class="w-100"></div><br>

        <div class="col-3">
            <?php if($user->checkUserAdmin($user_id)): ?>
                <button type="button" class="btn btn-danger"><a href="admin.create.brand.view.php" style="color:white; text-decoration: none;">Kreiranje brenda</a></button>
            <?php endif; ?>
        </div>  

        <div class="col-3">
            <?php if($user->checkUserAdmin($user_id)): ?>
                <button type="button" class="btn btn-danger"><a href="admin.delete.brand.view.php" style="color:white; text-decoration: none;">Brisanje brenda</a></button>
            <?php endif; ?>
        </div>   

        <div class="col-3">
            <?php if($user->checkUserAdmin($user_id)): ?>
                <button type="button" class="btn btn-danger"><a href="admin.update.brand.view.php" style="color:white; text-decoration: none;">Izmena brenda</a></button>
            <?php endif; ?>
        </div>   

        <div class="w-100"></div><br>

        <div class="col-3">
            <?php if($user->checkUserAdmin($user_id)): ?>
                <button type="button" class="btn btn-warning"><a href="admin.add.role.view.php" style="color:white; text-decoration: none;">Dodela prava</a></button>
            <?php endif; ?>
        </div>

        <div class="col-3">
            <?php if($user->checkUserAdmin($user_id)): ?>
                <button type="button" class="btn btn-warning"><a href="admin.delete.role.view.php" style="color:white; text-decoration: none;">Brisanje prava</a></button>
            <?php endif; ?>
        </div>

        <div class="w-100"></div><br>

        <div class="col-3">
            <?php if($user->checkUserAdmin($user_id) or $user->checkUserBloger($user_id)): ?>
                <button type="button" class="btn btn-success"><a href="admin.create.product.view.php" style="color:white; text-decoration: none;">Kreiranje proizvoda</a></button>
            <?php endif; ?>
        </div>   

        <div class="col-3">
            <?php if($user->checkUserAdmin($user_id) or $user->checkUserBloger($user_id)): ?>
                <button type="button" class="btn btn-success"><a href="admin.change.product.status.view.php" style="color:white; text-decoration: none;">Status proizvoda</a></button>
            <?php endif; ?>
        </div>

        <div class="col-3">
            <?php if($user->checkUserAdmin($user_id) or $user->checkUserBloger($user_id)): ?>
                <button type="button" class="btn btn-success"><a href="admin.update.product.quantity.view.php" style="color:white; text-decoration: none;">Količina proizvoda</a></button>
            <?php endif; ?>
        </div>   

        <div class="w-100"></div><br>

        <div class="col-3">
            <?php if($user->checkUserAdmin($user_id) or $user->checkUserBloger($user_id)): ?>
                <button type="button" class="btn btn-success"><a href="admin.orders.view.php" style="color:white; text-decoration: none;">Porudžbine</a></button>
            <?php endif; ?>
        </div>



    </div>
</div>
<br>
<br>
<?php require '../partials/footer.php'; ?>