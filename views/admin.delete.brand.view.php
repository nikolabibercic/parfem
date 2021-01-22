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
 $setting->navbar('Forma za brisanje brenda');
?>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/delete.brand.php" method="POST">
                <div class="form-group">
                    <select name="brandId" id="">
                        <?php  $result = $product->selectAllBrands(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->brand_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>            
                <button class="btn btn-danger" type="submit" name="deleteBrand">Obriši brend</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['brandDeleted']) && $_GET['brandDeleted']==true): ?>
                <div class="alert alert-success" role="alert">Obrisao si brend</div>
            <?php endif; ?>
            <?php if(isset($_GET['brandDeleted']) && $_GET['brandDeleted']==false): ?>
                <div class="alert alert-danger" role="alert">Brisanje brenda nije uspelo!</div>
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