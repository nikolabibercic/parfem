<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php
    $user_id = $_SESSION['user']->user_id;
    // Provera da li je user ulogovan, ako nije salje na index.php stranicu
    if(!$user_id){
        header('Location: ../index.php');
    }

    // Ako je admin ili bloger ne moze na cart.view stranicu, salje ga na index.php stranicu
    if($user->checkUserAdmin($user_id) or $user->checkUserBloger($user_id)){
        header('Location: ../index.php'); 
    }

    $items = $cart->selectAllCartItems($user_id);

    $CartItemsSum = $cart->CartItemsSum($user_id)
?>

<?php
//Navbar
 $setting->navbar('Korpa');
?>

<br>

<div class="container">
    <div class="row">
        <?php if(!$items): ?>
            <div class="col-12">
                <h1 class="text-center">Korpa je prazna</h1>
                <br>
                <h4 class="text-center">Pretraži parfeme <a href="../index.php">ovde</a></h4>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        <?php else: ?>
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <!--<th>Kategorija</th>-->
                            <th>Parfem</th>
                            <th>ML</th>
                            <th>Cena</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach($items as $i): ?>
                        <tr>
                            <!--<td><?php // echo $i->category_name ?></td>-->
                            <td><?php echo $i->brand_name.' '.$i->product_name ?></td>
                            <td><?php echo $i->size ?></td>
                            <td><?php echo $i->selling_price ?></td>
                            <td><a class="btn btn-danger btn-sm" href="../files/cart.item.disabled.php?cartItemId=<?php echo $i->cart_item_id ?>">Izbaci</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>    

                    <tfoot>
                        <tr>
                            <!--<td></td>-->
                            <td></td>
                            <td><b>Ukupno</b></td>
                            <td><?php echo '<b>'.$CartItemsSum[0]->Price.' EUR</b>' ?></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>    

            <div class="col-12">
            <br>
            <br>
                <h5 class="text-center float-left">Ubaci još parfema u korpu <a href="../index.php">ovde</a></h5>
                <a class="btn btn-success float-right" href="../files/order.details.php">
                    <?php 
                            $cartItemsCount = $cart->cartItemsCount($userId);
                            if($cartItemsCount[0]->CountItems > 1){
                                echo 'Poruči parfeme';
                            }else{
                                echo 'Poruči parfem';
                            };
                    ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
    
    <?php if(isset($_GET['cartItemDisabled']) && $_GET['cartItemDisabled']==true): ?>
            <br>
            <br>
            <div class="alert alert-success" role="alert">Artikal je uspešno obrisan iz korpe</div>
            <br>
    <?php endif; ?>
    <?php if(isset($_GET['cartItemDisabled']) && $_GET['cartItemDisabled']==false): ?>
            <br>
            <br>
            <div class="alert alert-danger" role="alert">Brisanje artikla nije uspelo!</div>
            <br>
    <?php endif; ?>
    <br>
    <br>
    <br>
    <br>
</div>

<?php require '../partials/carousel.php'; ?>

<?php require '../partials/footer.php'; ?>

