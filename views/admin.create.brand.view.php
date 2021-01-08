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

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Forma za kreiranje brenda</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/insert.brand.php" method="POST">
                <div class="form-group">
                    <input type="text" name="brandName" placeholder="Naziv brenda" class="form-control" required><br>
                </div>            
                <button class="btn btn-success" type="submit" name="insertBrand">Kreiraj brend</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['brandInserted']) && $_GET['brandInserted']==true): ?>
                <div class="alert alert-success" role="alert">Kreirao si brend</div>
            <?php endif; ?>
            <?php if(isset($_GET['brandInserted']) && $_GET['brandInserted']==false): ?>
                <div class="alert alert-danger" role="alert">Kreiranje brenda nije uspelo!</div>
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