<section id="main-slider" class="main-slider">
    <div class="inner">

        <?php foreach ($storesSliders as $storesSlider) : ?>
        <div class="slide slide1" style="background-image: url(<?php echo $this->request->webroot . 'img/galerys/12/' . $storesSlider->slider;?>);">
            <div class="container">
                <div class="slide-inner1 common-inner">

                    <span class="h1"  data-animation="drop" data-delay="0.5s" ><?=$storesSlider->title;?> <br> <?=$storesSlider->subtitle;?></span>
                </div>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
</section>
