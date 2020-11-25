<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php
    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: ../index.php'); 
    }
?>

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Administracija proizvoda</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-3">
        </div> 
        <div class="col-6">
            <hr style="height:2px; background-color:black;"><br>
            
            <h5>Forma za kreiranje kategorije</h5><br>        
            <form action="../files/insert.category.php" method="POST">
                <div class="form-group">
                    <input type="text" name="categoryName" placeholder="Naziv kategorije" class="form-control" required><br>
                </div>
                <button type="submit" name="insertCategory">Kreiraj kategoriju</button>
            </form>
            <br>
            <?php if(isset($_GET['categoryInserted']) && $_GET['categoryInserted']==true): ?>
                <div class="alert alert-success" role="alert">Kreirao si kategoriju</div>
            <?php endif; ?>

            <?php if(isset($_GET['categoryInserted']) && $_GET['categoryInserted']==false): ?>
                <div class="alert alert-danger" role="alert">Kreiranje kategorije nije uspelo!</div>
            <?php endif; ?>
            
            <hr style="height:2px; background-color:black;"><br>

            <h5>Forma za brisanje kategorije</h5><br>          
            <form action="../files/delete.category.php" method="POST">
                <div class="form-group">
                    <select name="categoryId" id="">
                        <?php  $result = $product->selectAllCategories(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->category_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>            
                <button type="submit" name="deleteCategory">Obriši kategoriju</button>
            </form>
            <br>
            <?php if(isset($_GET['categoryDeleted']) && $_GET['categoryDeleted']==true): ?>
                <div class="alert alert-success" role="alert">Obrisao si kategoriju</div>
            <?php endif; ?>

            <?php if(isset($_GET['categoryDeleted']) && $_GET['categoryDeleted']==false): ?>
                <div class="alert alert-danger" role="alert">Brisanje kategorije nije uspelo!</div>
            <?php endif; ?>
                        
            <hr style="height:2px; background-color:black;"><br>

            <h5>Forma za kreiranje brenda</h5><br>          
            <form action="../files/insert.brand.php" method="POST">
                <div class="form-group">
                    <input type="text" name="brandName" placeholder="Naziv brenda" class="form-control" required><br>
                    <p>Kategorija:</p>
                    <select name="categoryId" id="">
                        <?php  $result = $product->selectAllCategories(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->category_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>            
                <button type="submit" name="insertBrand">Kreiraj brend</button>
            </form>
            <br>
            <?php if(isset($_GET['brandInserted']) && $_GET['brandInserted']==true): ?>
                <div class="alert alert-success" role="alert">Kreirao si brend</div>
            <?php endif; ?>

            <?php if(isset($_GET['brandInserted']) && $_GET['brandInserted']==false): ?>
                <div class="alert alert-danger" role="alert">Kreiranje brenda nije uspelo!</div>
            <?php endif; ?>
                        
            <hr style="height:2px; background-color:black;"><br>

            <h5>Forma za brisanje brenda</h5><br>          
            <form action="../files/delete.brand.php" method="POST">
                <div class="form-group">
                    <select name="brandId" id="">
                        <?php  $result = $product->selectAllBrands(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->brand_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                </div>            
                <button type="submit" name="deleteBrand">Obriši brend</button>
            </form>
            <br>
            <?php if(isset($_GET['brandDeleted']) && $_GET['brandDeleted']==true): ?>
                <div class="alert alert-success" role="alert">Obrisao si brand</div>
            <?php endif; ?>

            <?php if(isset($_GET['brandDeleted']) && $_GET['brandDeleted']==false): ?>
                <div class="alert alert-danger" role="alert">Brisanje brenda nije uspelo!</div>
            <?php endif; ?>
                        
            <hr style="height:2px; background-color:black;"><br>

        </div>    
        <div class="col-3">
        </div>  
    </div>
</div>

<?php require '../partials/footer.php'; ?>