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
            <h1 class="display-4">Forma - izmena prodajne cene proizvoda</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/update.product.selling.price.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">

                    Prodajne cene proizvoda:<br><br>
                    <select name="productId" id="">
                        <?php  $result = $product->selectProducts2(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->product_id; ?> class="form-control"><?php echo 'Id '.$x->product_id.' '.$x->brand_name.' '.$x->name.': selling price '.$x->selling_price; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <input type="number" name="sellingPrice" placeholder="Prodajna cena" class="form-control" required><br>

                </div>            
                <button class="btn btn-success" type="submit" name="updateProductSellingPrice">Izmeni</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['productSellingPriceUpdated']) && $_GET['productSellingPriceUpdated']==true): ?>
                <div class="alert alert-success" role="alert">Napravio si izmenu</div>
            <?php endif; ?>
            <?php if(isset($_GET['productSellingPriceUpdated']) && $_GET['productSellingPriceUpdated']==false): ?>
                <div class="alert alert-danger" role="alert">Izmena nije uspela!</div>
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