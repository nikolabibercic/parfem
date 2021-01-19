<?php
    require '../objects.php';
    
    $productId = $_GET['productId'];

    $products = $product->selectProduct($productId);

    //var_dump($products);
?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php require '../partials/index.jumbotron.php'; ?>

<br>

<?php require '../views/products.search.view.php'; ?>

<br>

<div class="container">

    <div class="row">


        <div class="col-12">
        
            <?php require '../files/products.generate.php'; //Generisanje kartica sa proizvodima ?> 
            <br>

        </div>


    </div>   

</div>

<?php require '../partials/carousel.php'; ?>

<?php require '../partials/footer.php'; ?>



