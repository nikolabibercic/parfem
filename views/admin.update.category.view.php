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
            <h1 class="display-4">Forma za izmenu kategorije</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/update.category.php" method="POST">
                <div class="form-group">
                    <select name="categoryId" id="">
                        <?php  $result = $product->selectAllCategories(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->category_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                    <input type="text" name="categoryNameNew" placeholder="Novi naziv kategorije" class="form-control" required><br>
                </div>            
                <button class="btn btn-warning" type="submit" name="updateCategory">Izmeni naziv kategorije</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['categoryUpdated']) && $_GET['categoryUpdated']==true): ?>
                <div class="alert alert-success" role="alert">Izmenio si kategoriju</div>
            <?php endif; ?>
            <?php if(isset($_GET['categoryUpdated']) && $_GET['categoryUpdated']==false): ?>
                <div class="alert alert-danger" role="alert">Izmena kategorije nije uspela!</div>
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