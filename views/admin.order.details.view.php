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

<?php
//Navbar
 $setting->navbar('Forma - detalji porudžbine');
?>

<br>

<div class="container">
    <div class="row">

            <div class="col-12">
                <h3>Detalji porudžbine</h3>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <!--<th>Kategorija</th>-->
                            <th>Brand</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Size</th>
                            <th>Selling price</th>
                            <th>Status</th>
                            <th>Change status</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php   
                        $transactionId = $_GET['transactionId'];
                        $orders = $order->selectOrderDetails($transactionId);
                        foreach($orders as $o):
                    ?>
                        <tr>
                            <td><?php echo $o->brand_name; ?></td>
                            <td><?php echo $o->product_name; ?></td>  
                            <td><?php echo $o->category_name; ?></td>
                            <td><?php echo $o->size; ?></td>
                            <td><?php echo $o->selling_price; ?></td>
                            <td><?php echo $o->cart_item_status; ?></td>
                            <td><a class="btn btn-success btn-sm" href="../files/cart.item.status.update.php?cartItemId=<?php echo $o->cart_item_id; ?>&transactionId=<?php echo $transactionId;  ?>">Kompletiraj</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>    
                    
                </table>
                <br>
                <br>
                <?php if(isset($_GET['cartItemStatusChanged']) && $_GET['cartItemStatusChanged']==true): ?>
                    <div class="alert alert-success" role="alert">Status je promenjen</div>
                <?php endif; ?>
                <?php if(isset($_GET['cartItemStatusChanged']) && $_GET['cartItemStatusChanged']==false): ?>
                    <div class="alert alert-danger" role="alert">Promena statusa nije uspela!</div>
                <?php endif; ?>
            </div>  

    </div>
</div>
<br>
<br>
<br>
<?php require '../partials/footer.php'; ?>