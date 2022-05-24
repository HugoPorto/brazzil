<?php $this->layout = false; ?>

<?php echo $this->element('store_head_product_view'); ?>

<body id="body" class="main">

<?php echo $this->element('store_bottombar'); ?>

<?php echo $this->element('store_header'); ?>

<div class="main-wrapper home_transparent-wrapper @@active  product-single">

<?php echo $this->element('store_product_view'); ?>

<?php echo $this->element('store_contact'); ?>

<?php echo $this->element('store_footer'); ?>
