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
            <h1 class="display-4">Forma za kreiranje brenda</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/insert.product.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">

                    Brend:<br><br>
                    <select name="brandId" id="">
                        <?php  $result = $product->selectAllBrands(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->brand_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    Kategorija:<br><br>
                    <select name="categoryId" id="">
                        <?php  $result = $product->selectAllCategories(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->category_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <input type="text" name="name" placeholder="Naziv proizvoda" class="form-control" required><br>

                    <input type="number" name="size" placeholder="Veličina" class="form-control" required><br>

                    <input type="number" name="quantity" placeholder="Količina" class="form-control" required><br>

                    <input type="number" name="purchasePrice" step=0.01 placeholder="Kupovna cena" class="form-control" required><br>

                    <input type="number" name="sellingPrice" step=0.01 placeholder="Prodajna cena" class="form-control" required><br>

                    <input type="text" name="otherInformation" placeholder="Ostalo" class="form-control" ><br>

                    Ubaci sliku:<br><br>
                    <input type="file" name="image1" id="image1" class="form-control"><br>

                </div>            
                <button class="btn btn-success" type="submit" name="insertBrand">Kreiraj proizvod</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['productInserted']) && $_GET['productInserted']==true): ?>
                <div class="alert alert-success" role="alert">Kreirao si proizvod</div>
            <?php endif; ?>
            <?php if(isset($_GET['productInserted']) && $_GET['productInserted']==false): ?>
                <div class="alert alert-danger" role="alert">Kreiranje proizvoda nije uspelo!</div>
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