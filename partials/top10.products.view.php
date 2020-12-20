<?php
   
    $products = $product->selectTop10Products();

    //var_dump($products);

?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-3">
        </div> 

        <div class="col-6">
            <?php require 'files/products.generate.php'; //Generisanje kartica sa proizvodima ?>
        </div>   

        <div class="col-3">
        </div>  
    </div>
</div>