<div class="container">
    <div class="row">
        <div class="col-3">
        </div> 
        <div class="col-6">
            <br>
            <form action="/shop/views/products.view.php" method="GET">

                <div class="form-group">
                    <label for="">Pretraga:</label>
                    <input type="text" name="search" placeholder="Pretraži sajt..." class="form-control" > <br>       

                    <label for="">Kategorija:</label>
                    <select name="categoryId" class="form-control" onchange="showBrands(this.value)" id="exampleFormControlSelect1" >
                        <option value="0">Sve</option>
                        <?php  $result = $product->selectAllCategories(); foreach($result as $x):  ?>
                                <option value=<?php echo $x->category_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br>

                    <div id="txtHint"></div>
                    <br>

                    <script>
                        function showBrands(categoryId) {
                        var xhttp;
                        if (categoryId == "") {
                            document.getElementById("txtHint").innerHTML = "";
                            return;
                        }
                        xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "/shop/files/selectBrandsList.php?categoryId="+categoryId, true);
                        xhttp.send();
                        }
                    </script>
                </div>

                <button type="submit" class="btn btn-primary" name="searchProducts">Traži</button>
            </form>
        </div>    
        <div class="col-3">
        </div>  
    </div>
</div>
<br>