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
            <h1 class="display-4">Forma za izmenu brenda</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/update.brand.php" method="POST">
                <div class="form-group">
                    <select name="brandId" id="">
                        <?php  $result = $product->selectAllBrands(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->brand_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                    <input type="text" name="brandNameNew" placeholder="Novi naziv brenda" class="form-control" required><br>
                </div>            
                <button class="btn btn-warning" type="submit" name="updateBrand">Izmeni naziv brenda</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['brandUpdated']) && $_GET['brandUpdated']==true): ?>
                <div class="alert alert-success" role="alert">Izmenio si naziv brenda</div>
            <?php endif; ?>
            <?php if(isset($_GET['brandUpdated']) && $_GET['brandUpdated']==false): ?>
                <div class="alert alert-danger" role="alert">Izmena naziva brenda nije uspela!</div>
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