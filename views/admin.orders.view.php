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

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Forma za porudžbine</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">

            <div class="col-12">
                <h3>Poručeni parfemi</h3>
                <table class="table table-dark table-striped table-hover">
                    <thead>
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
<br>
<br>
<br>
<?php require '../partials/footer.php'; ?>