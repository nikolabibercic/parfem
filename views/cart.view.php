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

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Korpa</h1>
    </div>
</div>

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
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach($items as $i): ?>
                        <tr>
                            <!--<td><?php // echo $i->category_name ?></td>-->
                            <td><?php echo $i->brand_name.' '.$i->product_name ?></td>
                            <td><?php echo $i->size ?></td>
                            <td><?php echo $i->selling_price ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>    

                    <tfoot>
                        <tr>
                            <!--<td></td>-->
                            <td></td>
                            <td><b>Ukupno</b></td>
                            <td><?php echo '<b>'.$CartItemsSum[0]->Price.' EUR</b>' ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>    

            <div class="col-12">
            <br>
            <br>
                <h5 class="text-center float-left">Ubaci još parfema u korpu <a href="../index.php">ovde</a></h5>
                <a class="btn btn-success float-right" href="../files/order.details.php">Poruči parfeme</a>
            </div>
        <?php endif; ?>
    </div>
    <br>
    <br>
</div>

<?php require '../partials/footer.php'; ?>

