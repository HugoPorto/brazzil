<?php $this->layout = false; ?>

<?php echo $this->element('store_head'); ?>

<body id="body" class="">

<?php echo $this->element('store_bottombar'); ?>

<?php echo $this->element('store_header'); ?>

<div class="main-wrapper home_transparent-wrapper @@active  home-beauty">

<?php if ($configs->status_banner_main) :?>
    <div class="row">
        <img class="img-fluid" <?= $banner; ?> />
    </div>
<?php endif;?>

<?php echo $this->element('store_slider'); ?>

<?php echo $this->element('store_products_site_main_page'); ?>

<?php if (sizeof($storesPartners->toArray())) :?>
    <section class="brand_carousel bg-primary">
        <div class="container">
            <div class="slick_brands">
                <?php foreach ($storesPartners as $storesPartner) : ?>
                    <div class="brand_single">
                        <div class="brand_img">
                            <img src="assets/img/home/brands/brand1.png" alt="">
                            <img style="width: 174px;" <?= $storesPartner->photo ?>/>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif;?>

<?php echo $this->element('store_contact'); ?>

<?php echo $this->element('store_footer'); ?>
