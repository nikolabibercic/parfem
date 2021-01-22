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
 $setting->navbar('Forma za brisanje kategorije');
?>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/delete.category.php" method="POST">
                <div class="form-group">
                    <select name="categoryId" id="">
                        <?php  $result = $product->selectAllCategories(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->category_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>            
                <button class="btn btn-danger" type="submit" name="deleteCategory">Obriši kategoriju</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['categoryDeleted']) && $_GET['categoryDeleted']==true): ?>
                <div class="alert alert-success" role="alert">Obrisao si kategoriju</div>
            <?php endif; ?>
            <?php if(isset($_GET['categoryDeleted']) && $_GET['categoryDeleted']==false): ?>
                <div class="alert alert-danger" role="alert">Brisanje kategorije nije uspelo!</div>
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