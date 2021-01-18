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
            <h1 class="display-4">Forma za brisanje načina isporuke</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/delete.delivery.method.php" method="POST">
                <div class="form-group">
                    <select name="deliveryMethodId" id="">
                        <?php  $result = $product->selectDeliveryMethods(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->delivery_method_id; ?> class="form-control"><?php echo $x->delivery_method; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>            
                <button class="btn btn-danger" type="submit" name="deleteDeliveryMethod">Obriši način isporuke</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['deliveryMethodDeleted']) && $_GET['deliveryMethodDeleted']==true): ?>
                <div class="alert alert-success" role="alert">Obrisao si način isporuke</div>
            <?php endif; ?>
            <?php if(isset($_GET['deliveryMethodDeleted']) && $_GET['deliveryMethodDeleted']==false): ?>
                <div class="alert alert-danger" role="alert">Brisanje načina isporuke nije uspelo!</div>
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