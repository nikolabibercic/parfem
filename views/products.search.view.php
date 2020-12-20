<div class="container">
    <div class="row">
        <div class="col-3">
        </div> 
        <div class="col-6">
            <br>
            <form action="/parfem/views/products.view.php" method="GET">
            
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pretraga:</label>
                    <input type="text" name="search" placeholder="Pretraži sajt..." class="form-control" > <br>       

                    <label for="exampleFormControlSelect1">Kategorija:</label>
                    <select name="categoryId" class="form-control" id="exampleFormControlSelect1" >
                        <option value="0">Sve</option>
                        <?php  $result = $product->selectAllCategories(); foreach($result as $x):  ?>
                                <option value=<?php echo $x->category_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br>

                    <label for="exampleFormControlSelect1">Brend:</label>
                    <select name="brandId" class="form-control" id="exampleFormControlSelect1" >
                        <option value="0">Sve</option>
                        <?php  $result = $product->selectAllBrands(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->brand_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br>      
                </div>

                <button type="submit" class="btn btn-primary" name="searchProducts">Traži</button>
            </form>
        </div>    
        <div class="col-3">
        </div>  
    </div>
</div>