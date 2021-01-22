<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php

    // Provera da li user ima admin pravo
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: user.view.php'); 
    }
?>

<?php
//Navbar
 $setting->navbar('Forma za brisanje prava');
?>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/delete.role.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">

                    Korisnici:<br><br>
                    <select name="userRoleId" id="">
                        <?php  $result = $user->selectAdminAndBlogerUsers(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->user_role_id; ?> class="form-control"><?php echo $x->role_name.' '.$x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                </div>            
                <button class="btn btn-success" type="submit" name="deleteRole">Obriši pravo</button>
            </form>
            <br>
            <br>

            <?php if(isset($_GET['roleDeleted']) && $_GET['roleDeleted']==true): ?>
                <div class="alert alert-success" role="alert">Obrisa si pravo</div>
            <?php endif; ?>
            <?php if(isset($_GET['roleDeleted']) && $_GET['roleDeleted']==false): ?>
                <div class="alert alert-danger" role="alert">Brisanje prava nije uspelo!</div>
            <?php endif; ?>

        </div>  

        <div class="col-3">
        </div>  

    </div>
</div>
<br>
<br>
<br>
<?php require '../partials/footer.php'; ?>