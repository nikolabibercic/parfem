<?php
    require '../objects.php';
    
    $search = $_GET['search'];
    $categoryId = $_GET['categoryId'];
    $brandId = $_GET['brandId'];

    $products = $product->selectAllProducts($search,$categoryId,$brandId);

    //var_dump($products);

?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php require '../partials/index.jumbotron.php'; ?>

<br>

<?php require '../views/products.search.view.php'; ?>

<br>

<?php if(!$products): ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-3">
            </div> 
            <div class="col-6">
                <div class="alert alert-danger" role="alert">Nisu pronađeni parfemi po zadatim parametrima!</div>
            </div>    
            <div class="col-3">
            </div>  
        </div>
    </div>
    <br>
    <br>
<?php endif; ?>


<div class="container">

    <div class="row">

        <div class="col-3">
        </div> 

        <div class="col-6">
            <?php require '../files/products.generate.php'; //Generisanje kartica sa proizvodima ?> 
        </div>

        <div class="col-3">
        </div> 

    </div>   

</div>

<?php require '../partials/footer.php'; ?>



