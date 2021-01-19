<?php foreach($products as $p): ?>
                <div class="card mx-auto" style="width: 18rem;">
                    <div class="card-header">
                        <h5><a href="/shop/views/product.view.php?productId=<?php echo $p->product_id ?>" style="color:black; text-decoration:none;"><?php echo $p->brand_name.' '.$p->product_name; ?></a></h5>
                    </div>
                    <a href="/shop/views/product.view.php?productId=<?php echo $p->product_id ?>"><img src=<?php echo $p->image; ?> class="card-img-top" alt=""></a>
                    <div class="card-body">

                        <p class="card-text"><?php echo '<b>Cena: </b>'.$p->selling_price.' EUR <br><b>'.'Zapremina: </b>'.$p->size.' ML<br>'.'<b>Kategorija: </b>'.$p->category_name; ?></p>
                        
                    </div>
                    <div class="card-footer text-muted">
                        <a href="/shop/files/cart.php?productId=<?php echo $p->product_id ?>" class="btn btn-primary">Ubaci u korpu</a>
                    </div>
                </div>
                <br>
                <br>
<?php endforeach; ?>