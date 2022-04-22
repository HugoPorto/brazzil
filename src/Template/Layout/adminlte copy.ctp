<?php
$cakeDescription = 'teenagersbook';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
      <?= $cakeDescription ?>:
      <?= $this->fetch('title') ?>
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php echo $this->element('adminlte_css'); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-red sidebar-mini fixed">
    <div class="wrapper">
      <header class="main-header">
        <?php echo $this->element('adminlte_logo'); ?>
        <?php echo $this->element('adminlte_header_navbar'); ?>
      </header>

      <?php echo $this->element('adminlte_mainsidebar'); ?>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            <?= $this->fetch('title') ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i><?= $this->fetch('title') ?></a></li>
          </ol>
        </section>

        <section class="content container-fluid">
          <?= $this->fetch('content') ?>
        </section>
      </div>

      <?php echo $this->element('adminlte_footer'); ?>
      <?php echo $this->element('adminlte_controlsidebar'); ?>
      
      <div class="control-sidebar-bg"></div>
    </div>
    <?php echo $this->element('adminlte_scripts'); ?>
  </body>
</html>