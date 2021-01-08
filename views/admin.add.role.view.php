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

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Forma za dodelu prava</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/add.role.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">

                    Korisnici:<br><br>
                    <select name="formUserId" id="">
                        <?php  $result = $user->selectAllUsers(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->user_id; ?> class="form-control"><?php echo $x->role_name.' '.$x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    Prava:<br><br>
                    <select name="roleId" id="">
                        <?php  $result = $user->selectAllRoles(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->role_id; ?> class="form-control"><?php echo $x->name; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                </div>            
                <button class="btn btn-success" type="submit" name="addRole">Dodeli pravo</button>
            </form>
            <br>
            <br>

            <?php if(isset($_GET['roleAdded']) && $_GET['roleAdded']==true): ?>
                <div class="alert alert-success" role="alert">Dodelio si pravo</div>
            <?php endif; ?>
            <?php if(isset($_GET['roleAdded']) && $_GET['roleAdded']==false): ?>
                <div class="alert alert-danger" role="alert">Dodela prava nije uspela!</div>
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