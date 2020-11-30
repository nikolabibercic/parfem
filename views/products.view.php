<?php
    require '../objects.php';
    
    $search = $_POST['search'];
    $categoryId = $_POST['categoryId'];
    $brandId = $_POST['brandId'];

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
<?php endif; ?>

<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-3">
        </div> 
        <div class="col-6">
            <div class="row row-cols-1 row-cols-md-3">
                <?php foreach($products as $p): ?>
                <div class="col mb-4">
                    <div class="card">
                        <img src=<?php echo $p->image; ?> class="card-img-top" alt="..." height="180px" >
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $p->brand_name.'<br>'.$p->perfume_name; ?></h5>
                            <p class="card-text"><?php echo $p->size.' ML<br>'.'Cena: '.'<b>'.$p->selling_price.'</b>'.' EUR<br>'.$p->category_name; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>    
        <div class="col-3">
        </div>  
    </div>
</div>

<?php require '../partials/footer.php'; ?>



