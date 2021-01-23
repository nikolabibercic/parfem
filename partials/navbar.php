<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: darkblue; ">
            <a class="navbar-brand" href="/shop/index.php" style="font-family: 'Dancing Script', cursive;">
                <img src="/shop/images/siteImages/logo.png" class="card-img-top" alt="" style="height:30px; width:30px;">
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
                            <a href="/shop/views/admin.orders.view.php" class="nav-link" id="navLink1" style="color:white;">Porudzbine</a>
                        </li>
                    <?php elseif(isset($_SESSION['user']) and !$user->checkUserAdmin($userId) and !$user->checkUserBloger($userId)): //ako je ulogovan a nije admin i bloger ispisuje opciju Korpa ?>
                        <li class="nav-item">
                            <a href="/shop/views/cart.view.php" class="nav-link" id="navLink1" style="color:white;">
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
                        <li class="nav-item"><a href="/shop/views/contact.view.php" class="nav-link" id="navLink6" style="color:white;">Kontakt</a></li>  
                    <?php elseif(($user->checkUserAdmin($userId) or $user->checkUserBloger($userId))): //ako je admin ili bloger ne ispisuje nista ?>        
                        <?php echo ''; ?>
                    <?php endif; ?>

                    <?php //echo var_dump(isset($userId)); ?>

                    <?php if(isset($_SESSION['user'])): ?>        
                        <li class="nav-item">
                            <a href="/shop/views/admin.view.php" class="nav-link" id="navLink2" style="color:white;">
                                <?php
                                    echo $_SESSION['user']->name;
                                ?>
                            </a>
                        </li>
                        <li class="nav-item"><a href="/shop/files/logout.php" class="nav-link" id="navLink3" style="color:white;">Odjava</a></li>
                    <?php else: ?>
                        <li class="nav-item" ><a href="/shop/views/login.view.php" class="nav-link" id="navLink4" style="color:white;">Prijava</a></li>    
                    <?php endif; ?>
                    
                </ul>
            </div>   
    </nav>

    <?php $navbarJumbotronColor = $setting->selectSettingValue(3); ?>

    <hr class="" class="bg-warning" <?php echo 'style="background-color:'.$navbarJumbotronColor->setting_value.'; height:10px; margin:auto; " ' ?> > 

</div>