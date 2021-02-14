<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php

    // Provera da li user ima admin prava
    $user_id = $_SESSION['user']->user_id;

    if(!$user->checkUserAdmin($user_id)){
        header('Location: user.view.php'); 
    }
?>

<?php
//Navbar
 $setting->navbar('Forma za izmenu settings opcija');
?>

<br>

<div class="container">
    <div class="row">

        <div class="col-3">
        </div>  

        <div class="col-6">
            <form action="../files/update.settings.php" method="POST">
                <div class="form-group">

                    Settings:<br><br>
                    <select name="settingId" class="form-control" id="">
                        <?php  $result = $setting->selectAllSettings(); foreach($result as $x):  ?>
                            <option value=<?php echo $x->setting_id; ?> class="form-control"><?php echo $x->setting_description.': '.$x->setting_value.' / '.$x->setting_value_2; ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <input type="text" name="settingValue" placeholder="Setting value" class="form-control" ><br>

                    <input type="text" name="settingValue2" placeholder="Setting value 2" class="form-control" ><br>

                </div>            
                <button class="btn btn-success" type="submit" name="updateSetting">Izmeni</button>
            </form>
            <br>
            <br>
            <?php if(isset($_GET['settingUpdated']) && $_GET['settingUpdated']==true): ?>
                <div class="alert alert-success" role="alert">Izmena je napravljena</div>
            <?php endif; ?>
            <?php if(isset($_GET['settingUpdated']) && $_GET['settingUpdated']==false): ?>
                <div class="alert alert-danger" role="alert">Izmena nije uspela!</div>
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