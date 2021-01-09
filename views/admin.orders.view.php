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
            <h1 class="display-4">Forma - porudžbine</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">

            <div class="col-12">
                <h3>Porudžbine</h3>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <!--<th>Kategorija</th>-->
                            <th>Order ID</th>
                            <th>Tran ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Address</th>
                            <th>Zip code</th>
                            <th>City</th>
                            <th>Municipality</th>
                            <th>Phone</th>
                            <th>Delivery method</th>
                            <th>Order date</th>
                            <th>Details</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php $orders = $order->selectOrders();  foreach($orders as $o): ?>
                        <tr>
                            <td><?php echo $o->order_id ?></td>
                            <td><?php echo $o->transaction_id ?></td>
                            <td><?php echo $o->user_name ?></td>
                            <td><?php echo $o->user_surname ?></td>
                            <td><?php echo $o->user_address ?></td>
                            <td><?php echo $o->user_zip_code ?></td>
                            <td><?php echo $o->user_city ?></td>
                            <td><?php echo $o->user_municipality ?></td>
                            <td><?php echo $o->phone ?></td>
                            <td><?php echo $o->delivery_method ?></td>
                            <td><?php echo $o->order_date ?></td>
                            <td><a class="btn btn-success btn-sm" href="admin.order.details.view.php?transactionId=<?php echo $o->transaction_id ?>">Detalji</a></td>
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