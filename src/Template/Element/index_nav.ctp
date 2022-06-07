<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" id="main">

<div class="wrapper">

<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= $this->request->webroot . 'img/galerys/13/' . $storesLogo; ?>" alt="Logomarca" height="60">
</div>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">

    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= $this->request->base ?>/pages" class="nav-link">Home</a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= $this->request->base ?>/" target="_blank" class="btn btn-danger">Visualizar Site</a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">

        <?php if ($username) :?>
            <?php if ($role === 'common' || $role === 'storeAdmin') :?>
                <?php echo $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout'], ['class' => 'nav-link']);?>
            <?php endif; ?>
        <?php endif; ?>

    </li>

</ul>

<?php echo $this->element('index_nav_right'); ?>
