<?php require '../objects.php'; ?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
            <h1 class="display-4">Kontakt</h1>
    </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-3">
        </div> 
        <div class="col-6">
            <br>
            <form action="../files/contact.php" method="POST">
                <div class="form-group">
                    <?php if(isset($_SESSION['user'])): //Ako je user ulogovan ispisuje njegov email, u suprotnom polje je prazno ?>  
                        <input type="email" value=<?php echo $_SESSION['user']->email; ?> name="email" placeholder="Tvoj email" class="form-control" required ><br>
                    <?php else: ?>
                        <input type="email" value="" name="email" placeholder="Tvoj email" class="form-control" required ><br>    
                    <?php endif; ?>
                    <textarea class="form-control" name="text" placeholder="Ostavi poruku ovde" id="" style="height: 200px"></textarea><br>
                </div>
                <button type="submit" name="contact">Pošalji</button>
            </form>

            <?php if(isset($_GET['email']) && $_GET['email']==true): ?>
                <br>
                <br>
                <div class="alert alert-success" role="alert">Poruka je poslata</div>
            <?php endif; ?>
            <?php if(isset($_GET['email']) && $_GET['email']==false): ?>
                <div class="alert alert-danger" role="alert">Slanje poruke nije uspelo!</div>
            <?php endif; ?>

            <br>
            <br>
            <br>
        </div>    
        <div class="col-3">
        </div>  
    </div>
</div>

<?php require '../partials/footer.php'; ?>