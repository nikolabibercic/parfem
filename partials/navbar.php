<?php 
$navbarTextColor = $setting->selectSettingValue(23);
$navbarLogoImageLinkShow = $setting->selectSettingValue(24);
?>
<div class="sticky-top">
    <?php $navbarBackgroundColor = $setting->selectSettingValue(21); ?>
    <nav class="navbar navbar-expand-lg navbar-dark" <?php echo 'style="background-color: '.$navbarBackgroundColor[0]->setting_value.'; " '?> >
            <a class="navbar-brand" href="/shop/index.php" <?php echo 'style="font-family: Dancing Script, cursive; color:'.$navbarTextColor[0]->setting_value.'; " ' ?>>
                <?php $logoIconLink = $setting->selectSettingValue(17); ?>
                <?php if($navbarLogoImageLinkShow[0]->setting_value=='true'): ?>
                    <img src=<?php echo $logoIconLink[0]->setting_value ?> class="card-img-top" alt="" style="height:30px; width:30px;">
                <?php endif; ?>
                parfem.in.rs
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto">

                    <?php
                        //Ako je user ulogovan kupi njegov user id
                        if(isset($_SESSION['user'])){
                            $userId = $_SESSION['user']->user_id;
                        }
                    ?>  

                    <?php if(!isset($_SESSION['user'])): //ako nije ulogovan ne ispisuje nista ?>        
                        <?php echo ''; ?>
                    <?php elseif($user->checkUserAdmin($userId) or $user->checkUserBloger($userId)): //ako je admin ili bloger ispisuje opciju Porudzbine ?>
                        <li class="nav-item">
                            <a href="/shop/views/admin.orders.view.php" class="nav-link" id="navLink1" <?php echo 'style="color: '.$navbarTextColor[0]->setting_value.'; " '?>>Porudzbine</a>
                        </li>
                    <?php elseif(isset($_SESSION['user']) and !$user->checkUserAdmin($userId) and !$user->checkUserBloger($userId)): //ako je ulogovan a nije admin i bloger ispisuje opciju Korpa ?>
                        <li class="nav-item">
                            <a href="/shop/views/cart.view.php" class="nav-link" id="navLink1" <?php echo 'style="color: '.$navbarTextColor[0]->setting_value.'; " '?>>
                                <?php
                                    $cartItemsCount = $cart->cartItemsCount($userId);
                                    echo '<b>'.$cartItemsCount[0]->CountItems.'</b> ';
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">';
                                            echo '<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
                                        echo '</svg>';
                                ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(!isset($userId) or ( isset($userId) and !$user->checkUserAdmin($userId) and !$user->checkUserBloger($userId) ) ): //ako nije ulogovan, ili ako je ulogovan a nije admin ili bloger ima mogucnost da vidi kontakt stranicu ?>
                        <li class="nav-item"><a href="/shop/views/contact.view.php" class="nav-link" id="navLink6" <?php echo 'style="color: '.$navbarTextColor[0]->setting_value.'; " '?>>Kontakt</a></li>  
                    <?php elseif(($user->checkUserAdmin($userId) or $user->checkUserBloger($userId))): //ako je admin ili bloger ne ispisuje nista ?>        
                        <?php echo ''; ?>
                    <?php endif; ?>

                    <?php //echo var_dump(isset($userId)); ?>

                    <?php if(isset($_SESSION['user'])): ?>        
                        <li class="nav-item">
                            <a href="/shop/views/admin.view.php" class="nav-link" id="navLink2" <?php echo 'style="color: '.$navbarTextColor[0]->setting_value.'; " '?>>
                                <?php
                                    echo $_SESSION['user']->name;
                                ?>
                            </a>
                        </li>
                        <li class="nav-item"><a href="/shop/files/logout.php" class="nav-link" id="navLink3" <?php echo 'style="color: '.$navbarTextColor[0]->setting_value.'; " '?>>Odjava</a></li>
                    <?php else: ?>
                        <li class="nav-item" ><a href="/shop/views/login.view.php" class="nav-link" id="navLink4" <?php echo 'style="color: '.$navbarTextColor[0]->setting_value.'; " '?>>Prijava</a></li>    
                    <?php endif; ?>
                    
                </ul>
            </div>   
    </nav>

    <?php $navbarJumbotronColor = $setting->selectSettingValue(3); ?>

    <hr class="" class="bg-warning" <?php echo 'style="background-color:'.$navbarJumbotronColor[0]->setting_value.'; height:10px; margin:auto; " ' ?> > 

</div>