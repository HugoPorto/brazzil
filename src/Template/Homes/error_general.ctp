<?php $this->layout = false; ?>

<?php echo $this->element('store_head'); ?>

<body id="body" class="">

<?php echo $this->element('store_bottombar'); ?>

<?php echo $this->element('store_header'); ?>

<div class="main-wrapper home_transparent-wrapper @@active  product-right">

<section class="error-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-10 offset-md-2 offset-sm-1">
                <div class="error-content text-center">
                    <p>Oops!  <?= $message ?></p>
                    <a href="<?= $this->request->base ?>" class="btn btn-primary btn-default bold">Home</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->element('store_footer'); ?>
