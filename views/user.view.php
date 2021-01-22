<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php
    $user_id = $_SESSION['user']->user_id;
    // Provera da li je user ulogovan, ako nije salje na index.php stranicu
    if(!$user_id){
        header('Location: ../index.php');
    }

    // Ako je admin ili bloger ne moze na user.view stranicu, salje ga na admin.view
    if($user->checkUserAdmin($user_id) or $user->checkUserBloger($user_id)){
        header('Location: admin.view.php'); 
    }

    $items = $cart->selectOrderedDeliveredCartItems($user_id);

    $CartItemsSum = $cart->OrderedDeliveredCartItemsSum($user_id)
?>

<?php
//Navbar
 $setting->navbar('Korisnička stranica');
?>

<br>

<div class="container">
    <div class="row">
            <div class="col-12">
                <h3>Poručeni parfemi</h3>
                <table class="table">
                    <thead class="table table-dark">
                        <tr>
                        <!--<th>Kategorija</th>-->
                            <th>Parfem</th>
                            <th>ML</th>
                            <th>Cena</th>
                            <th>Status</th>
                            <th>Order date</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach($items as $i): ?>
                        <tr>
                            <td><?php echo $i->brand_name.' '.$i->product_name ?></td>
                            <td><?php echo $i->size ?></td>
                            <td><?php echo $i->selling_price ?></td>
                            <td><?php echo $i->cart_item_status ?></td>
                            <td><?php echo $i->cart_item_transaction_date ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>    
                    
                </table>
                <br>
                <br>
            </div>  
    </div>
</div>

<?php require '../partials/footer.php'; ?>