<div class="container-fluid text-center">
  <div class="row justify-content-center">


    <div class="col-12-fluid">

        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">

          <div class="carousel-inner">
            <?php $carouselImageLink1 = $setting->selectSettingValue(18); ?>
            <div class="carousel-item active" data-bs-interval="1000">
              <img src=<?php echo $carouselImageLink1[0]->setting_value; ?> class="d-block w-100" alt="..." style="max-height:500px; max-width:700px"  >
            </div>

            <?php $carouselImageLink2 = $setting->selectSettingValue(19); ?>
            <div class="carousel-item" data-bs-interval="2000">
              <img src=<?php echo $carouselImageLink2[0]->setting_value; ?> class="d-block w-100" alt="..." style="max-height:500px; max-width:700px"  >
            </div>

            <?php $carouselImageLink3 = $setting->selectSettingValue(20); ?>
            <div class="carousel-item" data-bs-interval="3000">
              <img src=<?php echo $carouselImageLink3[0]->setting_value; ?> class="d-block w-100" alt="..." style="max-height:500px; max-width:700px"  >
            </div>

            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>

          </div>


          </div>
    </div>

  </div>
</div>


