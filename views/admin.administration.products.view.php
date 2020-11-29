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

            <!--Poruke nakon insert, update i delete akcija-->
            <?php if(isset($_GET['categoryInserted']) && $_GET['categoryInserted']==true): ?>
                <div class="alert alert-success" role="alert">Kreirao si kategoriju</div>
            <?php endif; ?>
            <?php if(isset($_GET['categoryInserted']) && $_GET['categoryInserted']==false): ?>
                <div class="alert alert-danger" role="alert">Kreiranje kategorije nije uspelo!</div>
            <?php endif; ?>

            <?php if(isset($_GET['categoryDeleted']) && $_GET['categoryDeleted']==true): ?>
                <div class="alert alert-success" role="alert">Obrisao si kategoriju</div>
            <?php endif; ?>
            <?php if(isset($_GET['categoryDeleted']) && $_GET['categoryDeleted']==false): ?>
                <div class="alert alert-danger" role="alert">Brisanje kategorije nije uspelo!</div>
            <?php endif; ?>

            <?php if(isset($_GET['categoryUpdated']) && $_GET['categoryUpdated']==true): ?>
                <div class="alert alert-success" role="alert">Izmenio si kategoriju</div>
            <?php endif; ?>
            <?php if(isset($_GET['categoryUpdated']) && $_GET['categoryUpdated']==false): ?>
                <div class="alert alert-danger" role="alert">Izmena kategorije nije uspela!</div>
            <?php endif; ?>

            <?php if(isset($_GET['brandInserted']) && $_GET['brandInserted']==true): ?>
                <div class="alert alert-success" role="alert">Kreirao si brend</div>
            <?php endif; ?>
            <?php if(isset($_GET['brandInserted']) && $_GET['brandInserted']==false): ?>
                <div class="alert alert-danger" role="alert">Kreiranje brenda nije uspelo!</div>
            <?php endif; ?>

            <?php if(isset($_GET['brandDeleted']) && $_GET['brandDeleted']==true): ?>
                <div class="alert alert-success" role="alert">Obrisao si brend</div>
            <?php endif; ?>
            <?php if(isset($_GET['brandDeleted']) && $_GET['brandDeleted']==false): ?>
                <div class="alert alert-danger" role="alert">Brisanje brenda nije uspelo!</div>
            <?php endif; ?>

            <?php if(isset($_GET['brandUpdated']) && $_GET['brandUpdated']==true): ?>
                <div class="alert alert-success" role="alert">Izmenio si naziv brenda</div>
            <?php endif; ?>
            <?php if(isset($_GET['brandUpdated']) && $_GET['brandUpdated']==false): ?>
                <div class="alert alert-danger" role="alert">Izmena naziva brenda nije uspela!</div>
            <?php endif; ?>

            <?php if(isset($_GET['productInserted']) && $_GET['productInserted']==true): ?>
                <div class="alert alert-success" role="alert">Kreirao si proizvod</div>
            <?php endif; ?>
            <?php if(isset($_GET['productInserted']) && $_GET['productInserted']==false): ?>
                <div class="alert alert-danger" role="alert">Kreiranje proizvoda nije uspelo!</div>
            <?php endif; ?>

            <br>

            <hr style="height:2px; background-color:black;"><br>

            <h5>Forma za kreiranje kategorije</h5><br>        
            <form action="../files/insert.category.php" method="POST">
                <div class="form-group">
                    <input type="text" name="categoryName" placeholder="Naziv kategorije" class="form-control" required><br>
                </div>
                <button class="btn btn-success" type="submit" name="insertCategory">Kreiraj kategoriju</button>
            </form>
            <br>
            
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
                <button class="btn btn-danger" type="submit" name="deleteCategory">Obriši kategoriju</button>
            </form>
            <br>
                        
            <hr style="height:2px; background-color:black;"><br>

            <h5>Forma za izmenu kategorije</h5><br>          
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
                        
            <hr style="height:2px; background-color:black;"><br>

            <h5>Forma za kreiranje brenda</h5><br>          
            <form action="../files/insert.brand.php" method="POST">
                <div class="form-group">
                    <input type="text" name="brandName" placeholder="Naziv brenda" class="form-control" required><br>
                </div>            
                <button class="btn btn-success" type="submit" name="insertBrand">Kreiraj brend</button>
            </form>
            <br>

                        
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
                <button class="btn btn-danger" type="submit" name="deleteBrand">Obriši brend</button>
            </form>
            <br>
                 
            <hr style="height:2px; background-color:black;"><br>

            <h5>Forma za izmenu brenda</h5><br>          
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
                        
            <hr style="height:2px; background-color:black;"><br>

            <h5>Forma za kreiranje proizvoda</h5><br>          
            <form action="../files/insert.product.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">

                    Brend:<br><br>
                    <select name="brandId" id="">
                        <?php  $result = $product->selectAllBrands(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->brand_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    Kategorija:<br><br>
                    <select name="categoryId" id="">
                        <?php  $result = $product->selectAllCategories(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->category_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <input type="text" name="name" placeholder="Naziv proizvoda" class="form-control" required><br>

                    <input type="number" name="size" placeholder="Veličina" class="form-control" required><br>

                    <input type="number" name="quantity" placeholder="Količina" class="form-control" required><br>

                    <input type="number" name="purchasePrice" placeholder="Kupovna cena" class="form-control" required><br>

                    <input type="number" name="sellingPrice" placeholder="Prodajna cena" class="form-control" required><br>

                    <input type="text" name="otherInformation" placeholder="Ostalo" class="form-control" ><br>

                    Ubaci sliku:<br><br>
                    <input type="file" name="image1" id="image1" class="form-control"><br>

                </div>            
                <button class="btn btn-success" type="submit" name="insertBrand">Kreiraj proizvod</button>
            </form>
            <br>

            <hr style="height:2px; background-color:black;"><br>

        </div>    
        <div class="col-3">
        </div>  
    </div>
</div>

<?php require '../partials/footer.php'; ?>