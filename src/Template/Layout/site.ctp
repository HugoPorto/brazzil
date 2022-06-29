<?php echo $this->element('store_head'); ?>

<body id="body" class="">

<?php echo $this->element('store_bottombar'); ?>

<?php echo $this->element('store_header'); ?>

<div class="main-wrapper home_transparent-wrapper @@active  home-beauty">
    <!-- início do preloader -->
 <div id="preloader">
    <div class="inner">
       <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
       <div class="bolas">
          <div></div>
          <div></div>
          <div></div>                    
       </div>
    </div>
</div>

<?php if ($this->request->controller === 'Homes' && $this->request->action === 'site') : ?>
    <?php echo $this->element('store_banner_promocional'); ?>
    <?php echo $this->element('store_slider'); ?>
<?php endif;?>

<?= $this->fetch('content') ?>

<?php echo $this->element('store_contact'); ?>

<?php echo $this->element('store_footer'); ?>
