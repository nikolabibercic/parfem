
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: darkblue;">
        <a class="navbar-brand" href="/parfem/index.php">parfem.in.rs</a>
          
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item"><a href="" class="nav-link" id="navLink1" style="color:white;">Korpa</a></li>

                <?php if(isset($_SESSION['user'])): ?>        
                    <li class="nav-item">
                        <a href="/parfem/views/admin.view.php" class="nav-link" id="navLink2" style="color:white;">
                            <?php
                                echo $_SESSION['user']->name;
                            ?>
                        </a>
                    </li>
                    <li class="nav-item"><a href="/parfem/files/logout.php" class="nav-link" id="navLink3" style="color:white;">Odjava</a></li>
                <?php else: ?>
                    <li class="nav-item" ><a href="/parfem/views/login.view.php" class="nav-link" id="navLink4" style="color:white;">Prijava</a></li>    
                <?php endif; ?>

            </ul>
        </div>           
</nav>
