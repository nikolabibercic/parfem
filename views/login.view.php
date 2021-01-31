
<?php
    if(isset($_SESSION['user'])){
            header('Location: index.php');
        }
?>

<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php
//Navbar
 $setting->navbar('Prijava');
?>

<br>

<div class="container">
    <div class="row">
        <div class="col-3">
        </div> 
        <div class="col-6">
            <form action="../files/login.php" method="POST" autocomplete="on">
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="form-control" required><br>
                    <input type="password" name="password" autocomplete="on" placeholder="Password" class="form-control" required><br>
                </div>
                <button type="submit" name="logIn">Prijavi se</button>
                <br><br>
                <p>Ako nemaš nalog, registruj se ovde <a href="register.view.php">Registracija</a></p>
                <br>
                <br>
            </form>
        </div>    
        <div class="col-3">
        </div>  
    </div>
</div>
<br>
<br>

<?php    
    $carouselShow = $setting->selectSettingValue(16);
    if($carouselShow[0]->setting_value == 'true'){
        require '../partials/carousel.php';
    }
?>

<?php require '../partials/footer.php'; ?>