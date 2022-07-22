<?php if (sizeof($storesPartners->toArray())) :?>
    <section class="brand_carousel bg-primary">
        <div class="container">
            <div class="slick_brands">
                <?php foreach ($storesPartners as $storesPartner) : ?>
                    <div class="brand_single">
                        <div class="brand_img">
                            <img style="width: 174px;" <?= $storesPartner->photo ?>/>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif;?>