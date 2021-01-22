
    <?php $footerJumbotronColor = $setting->selectSettingValue(1); ?>
    
    <div class="container-fluid" <?php echo 'style="background-color:'.$footerJumbotronColor->setting_value.'; " ' ?> >
        <div class="row">
            <div class="col-12" >
                <br>
                <ul class="nav justify-content-center">
                    <li class="nav-item"><a href="#" class="nav-link"><img src="/shop/images/siteImages/facebookIcon.png" class="img-fluid" alt="Responsive image" width="40px" height="40px"></a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><img src="/shop/images/siteImages/instagramIcon.png" class="img-fluid" alt="Responsive image" width="40px" height="40px"></a></li>
                </ul>
                <br>

                <div class="text-center" style="font-size: 10px;">
                    <a href='https://www.freepik.com/photos/people'>People photo created by prostooleh - www.freepik.com</a>
                </div>
                <br>

            </div>
        </div>
    </div>

    <?php 
        $footerColor = $setting->selectSettingValue(5); 
        $footerTextColor = $setting->selectSettingValue(6); 
    ?>
    <div class="container-fluid" <?php echo 'style="background-color:'.$footerColor->setting_value.'; color:'.$footerTextColor->setting_value.'  " ' ?> >
        <div class="row">
            <div class="col-12 text-center">
                <div>
                    <br>
                    <p>&copy; All rights reserved</p>
                </div>
            </div>    
        </div>
    </div>
    
    <script src="/shop/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>
</html>