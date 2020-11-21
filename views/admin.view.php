
<?php
    if(isset($_SESSION['user'])){
            header('Location: index.php');
        }
        // Dodati proveru da li je user Admin
?>

<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Admin stranica</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-3">
        </div> 
        <div class="col-6">

        </div>    
        <div class="col-3">
        </div>  
    </div>
</div>

<?php require '../partials/footer.php'; ?>