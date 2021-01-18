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
            <h1 class="display-4">Forma za kreiranje načina isporuke</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/insert.delivery.method.php" method="POST">
                <div class="form-group">
                    <input type="text" name="deliveryMethodName" placeholder="Naziv načina isporuke" class="form-control" required><br>
                    <input type="number" name="price" placeholder="Cena" class="form-control" required><br>
                </div>
                <button class="btn btn-success" type="submit" name="insertDeliveryMethod">Kreiraj način isporuke</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['deliveryMethodInserted']) && $_GET['deliveryMethodInserted']==true): ?>
                    <div class="alert alert-success" role="alert">Kreirao si način isporuke</div>
                <?php endif; ?>
                <?php if(isset($_GET['deliveryMethodInserted']) && $_GET['deliveryMethodInserted']==false): ?>
                    <div class="alert alert-danger" role="alert">Kreiranje načina isporuke nije uspelo!</div>
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