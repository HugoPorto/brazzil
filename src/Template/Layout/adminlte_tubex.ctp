<!DOCTYPE html>
<html>
  <head>
    <meta name="exoclick-site-verification" content="2eb4ddfca2dfdeec7991ab6a654e1747">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
      <?= $title.': '.$subtitle ?>
    </title>
    <meta name="description" content="<?= $subtitle ?>">
    <meta name="canonical" content="http://teenagersbook.com">
    <meta name="author" content="focux microsystems">
    <meta name="robots" content="index,nofollow">
    <meta name="googlebot" content="index,nofollow">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php echo $this->element('adminlte_css'); ?>
    <?php echo $this->element('video_container'); ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php echo $this->element('adminlte_scripts_with_vue'); ?>
    <?= $this->element('favicon'); ?>
    <?php if($role == 'common'):?>
    <?php endif;?>
  </head>
  <body class="hold-transition skin-red sidebar-mini fixed 
  <?php 
    if(isset($page)){
      if($page == "profile"){
        echo "sidebar-collapse";
      }
    }
    ?>">
    <div class="wrapper" id="app">
      <header class="main-header">
        <?php echo $this->element('adminlte_logo'); ?>
        <?php echo $this->element('adminlte_header_navbar_tubex'); ?>
      </header>
      
      <div class="content-wrapper">
          <?= $this->Flash->render() ?>
          <?= $this->fetch('content') ?>
      </div>
      <?php echo $this->element('adminlte_controlsidebar_videos'); ?>
      <div class="control-sidebar-bg"></div>
      <?php 
      if(isset($page)){
        if($page == "profile"){
            echo $this->element('adminlte_modal_video');
          }
        }
      ?>
    </div>
    <?php echo $this->element('adminlte_scripts'); ?>
    <?php echo $this->element('select2'); ?>
    <?php echo $this->element('adminlte_scripts_with_vue_apply'); ?>
  </body>
</html>