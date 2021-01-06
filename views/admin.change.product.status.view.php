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
            <h1 class="display-4">Forma za deaktiviranje proizvoda</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/change.product.status.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">

                    Proizvodi:<br><br>
                    <select name="productId" id="">
                        <?php  $result = $product->selectProducts(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->product_id; ?> class="form-control"><?php echo $x->product_status.' '.$x->brand_name.' '.$x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    Statusi:<br><br>
                    <select name="productStatusId" id="">
                        <?php  $result = $product->selectProductStatuses(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->product_status_id; ?> class="form-control"><?php echo $x->product_status; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                </div>            
                <button class="btn btn-success" type="submit" name="changeStatus">Promeni status</button>
            </form>
            <br>
            <br>

            <?php if(isset($_GET['productStatusChanged']) && $_GET['productStatusChanged']==true): ?>
                <div class="alert alert-success" role="alert">Promenio si status</div>
            <?php endif; ?>
            <?php if(isset($_GET['productStatusChanged']) && $_GET['productStatusChanged']==false): ?>
                <div class="alert alert-danger" role="alert">Promena statusa nije uspela!</div>
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