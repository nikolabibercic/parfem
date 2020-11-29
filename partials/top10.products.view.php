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
            <div class="row row-cols-1 row-cols-md-3">
                <?php foreach($products as $p): ?>
                <div class="col mb-4">
                    <div class="card">
                        <img src=<?php echo $p->image; ?> class="card-img-top" alt="..." height="180px" >
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $p->brand_name.'<br>'.$p->perfume_name; ?></h5>
                            <p class="card-text"><?php echo $p->size.' ML<br>'.'Cena: '.'<b>'.$p->selling_price.'</b>'.' EUR<br>'.$p->category_name; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>    
        <div class="col-3">
        </div>  
    </div>
</div>