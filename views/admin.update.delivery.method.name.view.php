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

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Forma za izmenu naziva isporuke</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/update.delivery.method.name.php" method="POST">
                <div class="form-group">
                    <select name="deliveryMethodId" id="">
                        <?php  $result = $product->selectDeliveryMethods(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->delivery_method_id; ?> class="form-control"><?php echo $x->delivery_method; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                    <input type="text" name="deliveryMethodNameNew" placeholder="Novi naziv isporuke" class="form-control" required><br>
                </div>            
                <button class="btn btn-warning" type="submit" name="updateDeliveryMethodName">Izmeni naziv isporuke</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['deliveryMethodNameUpdated']) && $_GET['deliveryMethodNameUpdated']==true): ?>
                <div class="alert alert-success" role="alert">Izmenio si naziv isporuke</div>
            <?php endif; ?>
            <?php if(isset($_GET['deliveryMethodNameUpdated']) && $_GET['deliveryMethodNameUpdated']==false): ?>
                <div class="alert alert-danger" role="alert">Izmena naziva isporuke nije uspela!</div>
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