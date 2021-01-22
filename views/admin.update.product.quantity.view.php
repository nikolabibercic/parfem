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

<?php
//Navbar
 $setting->navbar('Forma - izmena količine proizvoda');
?>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/update.product.quantity.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">

                    Količina proizvoda:<br><br>
                    <select name="productId" id="">
                        <?php  $result = $product->selectProducts2(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->product_id; ?> class="form-control"><?php echo 'Id '.$x->product_id.' '.$x->brand_name.' '.$x->name.': quantity '.$x->quantity; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <input type="number" name="quantity" placeholder="Količina" class="form-control" required><br>

                </div>            
                <button class="btn btn-success" type="submit" name="updateProductQuantity">Izmeni</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['productQuantityUpdated']) && $_GET['productQuantityUpdated']==true): ?>
                <div class="alert alert-success" role="alert">Napravio si izmenu</div>
            <?php endif; ?>
            <?php if(isset($_GET['productQuantityUpdated']) && $_GET['productQuantityUpdated']==false): ?>
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