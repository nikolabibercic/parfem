<?php

    require 'objects.php';

    require 'partials/header.php';

    require 'partials/navbar.php';

    require 'partials/index.jumbotron.php';

    require 'views/products.search.view.php';

    require 'partials/top10.products.view.php';

    $carouselShow = $setting->selectSettingValue(16);
    if($carouselShow[0]->setting_value == 'true'){
        require 'partials/carousel.php';
    }

    require 'partials/footer.php';

?>