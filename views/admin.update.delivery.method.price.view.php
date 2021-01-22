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

<?php
//Navbar
 $setting->navbar('Forma za izmenu cene isporuke');
?>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/update.delivery.method.price.php" method="POST">
                <div class="form-group">
                    <select name="deliveryMethodId" id="">
                        <?php  $result = $product->selectDeliveryMethods(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->delivery_method_id; ?> class="form-control"><?php echo $x->delivery_method.': cena '.$x->delivery_price; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                    <input type="number" step=0.01 name="deliveryMethodPriceNew" placeholder="Nova cena isporuke" class="form-control" required><br>
                </div>            
                <button class="btn btn-warning" type="submit" name="updateDeliveryMethodPrice">Izmeni cenu isporuke</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['deliveryMethodPriceUpdated']) && $_GET['deliveryMethodPriceUpdated']==true): ?>
                <div class="alert alert-success" role="alert">Izmenio si cenu isporuke</div>
            <?php endif; ?>
            <?php if(isset($_GET['deliveryMethodPriceUpdated']) && $_GET['deliveryMethodPriceUpdated']==false): ?>
                <div class="alert alert-danger" role="alert">Izmena cene isporuke nije uspela!</div>
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