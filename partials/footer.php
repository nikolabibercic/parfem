
    <?php $footerJumbotronColor = $setting->selectSettingValue(1); ?>
    
    <div class="container-fluid" <?php echo 'style="background-color:'.$footerJumbotronColor->setting_value.'; " ' ?> >
        <div class="row">
            <div class="col-12" >
                <br>
                <ul class="nav justify-content-center">
                    <?php 
                        $facebookIconShow = $setting->selectSettingValue(7);
                        if($facebookIconShow->setting_value=='true'):
                     ?>
                        <li class="nav-item"><a href="#" class="nav-link"><img src=<?php $facebookIconLink = $setting->selectSettingValue(9); echo $facebookIconLink->setting_value; ?> class="img-fluid" alt="Responsive image" width="40px" height="40px"></a></li>
                    <?php endif; ?>
                    
                    <?php 
                        $instagramIconShow = $setting->selectSettingValue(8);
                        if($instagramIconShow->setting_value=='true'):
                     ?>
                        <li class="nav-item"><a href="#" class="nav-link"><img src=<?php $instagramIconLink = $setting->selectSettingValue(10); echo $instagramIconLink->setting_value; ?> class="img-fluid" alt="Responsive image" width="40px" height="40px"></a></li>
                    <?php endif; ?>

                </ul>
                <br>

                <div class="text-center" style="font-size: 10px;">
                    <a href='https://www.freepik.com/photos/people'>People photo created by prostooleh - www.freepik.com</a>
                    <br>
                    <br>
                    <br>
                    <a id="back-to-top" href="#" class="" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-up-square" viewBox="0 0 16 16" style="color: darkblue">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                        </svg>
                    </a>
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
    

    
    

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="/shop/main.js"></script>

</body>
</html>