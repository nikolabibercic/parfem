<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: user.view.php'); 
    }
?>

<?php
//Navbar
 $setting->navbar('Forma za kreiranje kategorije');
?>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/insert.category.php" method="POST">
                <div class="form-group">
                    <input type="text" name="categoryName" placeholder="Naziv kategorije" class="form-control" required><br>
                </div>
                <button class="btn btn-success" type="submit" name="insertCategory">Kreiraj kategoriju</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['categoryInserted']) && $_GET['categoryInserted']==true): ?>
                    <div class="alert alert-success" role="alert">Kreirao si kategoriju</div>
                <?php endif; ?>
                <?php if(isset($_GET['categoryInserted']) && $_GET['categoryInserted']==false): ?>
                    <div class="alert alert-danger" role="alert">Kreiranje kategorije nije uspelo!</div>
            <?php endif; ?>
        </div>  

        <div class="col-3">
        </div>  

    </div>
</div>
<br>
<br>
<br>
<?php require '../partials/footer.php'; ?>