<?= $this->element('store_head') ?>

<body id="body" class="">

<?= $this->element('store_bottombar') ?>

<?= $this->element('store_header') ?>

<div class="main-wrapper home_transparent-wrapper @@active  home-beauty">

<?= $this->element('store_preloader') ?>

<?php if ($this->request->controller === 'Homes' && $this->request->action === 'site') : ?>
    <?= $this->element('store_banner_promocional'); ?>
    <?= $this->element('store_slider'); ?>
<?php endif;?>

<?= $this->fetch('content') ?>

<?php if ($this->request->controller === 'Homes' && $this->request->action === 'site') : ?>
    <?php if ($configs->show_type_products !== 2) :?>
        <?= $this->element('store_partners') ?>
    <?php endif;?>
<?php endif;?>

<?php if ($configs->show_type_products === 2) :?>
    <?= $this->element('store_information') ?>
<?php endif;?>

<?php if ($configs->show_type_products !== 2) :?>
    <?= $this->element('store_contact') ?>
<?php endif;?>

<?= $this->element('store_footer'); ?>
