<?php echo $this->element('store_head'); ?>

<body id="body" class="">

<?php echo $this->element('store_bottombar'); ?>

<?php echo $this->element('store_header'); ?>

<div class="main-wrapper home_transparent-wrapper @@active  home-beauty">

<?php if ($this->request->controller === 'Homes' && $this->request->action === 'site') : ?>
    <?php echo $this->element('store_banner_promocional'); ?>
    <?php echo $this->element('store_slider'); ?>
<?php endif;?>

<?= $this->fetch('content') ?>

<?php echo $this->element('store_contact'); ?>

<?php echo $this->element('store_footer'); ?>
