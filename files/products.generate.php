
<?php foreach($products as $p): ?>
    <div class="card mx-auto" style="width: 18rem;">
        <img src=<?php echo $p->image; ?> class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title"><?php echo $p->brand_name.' '.$p->product_name; ?></h5>
            <p class="card-text"><?php echo 'Cena: <b>'.$p->selling_price.' EUR </b><br><b>'.$p->size.' ML</b><br>'.$p->category_name; ?></p>
            <a href="/shop/files/cart.php?productId=<?php echo $p->product_id ?>" class="btn btn-primary">Ubaci u korpu</a>
        </div>
    </div>
    <br>
<?php endforeach; ?>