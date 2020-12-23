<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php
    $user_id = $_SESSION['user']->user_id;
    // Provera da li je user ulogovan, ako nije salje na index.php stranicu
    if(!$user_id){
        header('Location: ../index.php');
    }

    // Ako je admin ili bloger ne moze na stranicu, salje ga na index.php stranicu
    if($user->checkUserAdmin($user_id) or $user->checkUserBloger($user_id)){
        header('Location: ../index.php'); 
    }

  //  $items = $cart->selectAllCartItems($user_id);

  //  $CartItemsSum = $cart->CartItemsSum($user_id)
?>

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Detalji pošiljke</h1>
    </div>
</div>

<br>

<div class="container">
<div class="row">
        <div class="col-3">
        </div> 
        <div class="col-6">
            <br>
            <form action="../files/order.php" method="POST">

                <div class="form-group">
                    <input type="text" name="userName" placeholder="Ime" class="form-control" required><br>       
                    <input type="text" name="userSurname" placeholder="Prezime" class="form-control" required><br>  
                    <input type="text" name="userAddress" placeholder="Ulica i broj" class="form-control" required><br>       
                    <input type="text" name="userZipCode" placeholder="Poštanski broj" class="form-control" required><br> 
                    <input type="text" name="userCity" placeholder="Grad" class="form-control" required><br> 

                    <label for="exampleFormControlSelect1">Način dostave:</label>
                    <select name="deliveryMethodId" class="form-control" id="exampleFormControlSelect1" >
                        <?php  $result = $tran->selectAllDeliveryMethods(); foreach($result as $x):  ?>
                                <option value=<?php echo $x->delivery_method_id; ?> class="form-control"><?php echo $x->delivery_method; ?></option>
                        <?php endforeach; ?>
                    </select><br>    
                </div>

                <button type="submit" class="btn btn-success float-right" name="order">Poruči</button>
            </form>
            <br>
            <br>
            <br>
        </div>    
        <div class="col-3">
        </div>  
    </div>
</div>

<?php require '../partials/footer.php'; ?>

