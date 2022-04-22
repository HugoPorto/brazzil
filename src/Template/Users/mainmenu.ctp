<?php $this->layout = false; ?>
<!doctype html>
<html lang="en">
  <head>
    <title>
        Focux
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php

    echo $this->Html->css('/bootstrap/css/bootstrap.min.css',
        [
            'integrity' => 'anonymous'
        ]);

    echo $this->Html->css('/bootstrap/css/docs/vendor/album.css');

    ?>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <?= $this->element('favicon'); ?>

  </head>
<header>
    <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About this area</h4>
            <p class="text-muted">Here you can to manage this site</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Logout</h4>
            <ul class="list-unstyled">
            <li>
                <?php
                    if($username)
                    {
                        echo $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']);
                    }
                ?>
            </li>
            <li>
                <?php
                    if($username && $role === "root")
                    {
                        echo $this->Html->link(__('Register Tables Root'), ['controller' => 'Tablesroots', 'action' => 'index']);
                    }
                ?>
            </li>
            <li>
                <?php
                    if($username && $role === "admin")
                    {
                        echo $this->Html->link(__('Register Tables Admin'), ['controller' => 'Tablesadmins', 'action' => 'index']);
                    }
                ?>
            </li>
            <li>
                <?php
                    if($username && $role === "colibri")
                    {
                        echo $this->Html->link(__('Register Tables Colibri'), ['controller' => 'Tablescolibris', 'action' => 'index']);
                    }
                ?>
            </li>
            <li>
                <?php
                    if($username && $role === "tubex")
                    {
                        echo $this->Html->link(__('Register Tables Tubex'), ['controller' => 'Tablestubex', 'action' => 'index']);
                    }
                ?>
            </li>
            <li>
                <?php
                    if($username && $role === "my_precious")
                    {
                        echo $this->Html->link(__('Register Tables My Precious'), ['controller' => 'Tablesmyprecious', 'action' => 'index']);
                    }
                ?>
            </li>
            </ul>
        </div>
        </div>
    </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="/focux" class="navbar-brand d-flex align-items-center">
                <strong>User: <?php echo $username ?></strong>
            </a>
            <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarHeader"
                aria-controls="navbarHeader"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
  <body style="background-color: #F8F4FA">
    <main role="main">
        <div class="container-fluid" style="padding-top:20px">
            <div class="row">
                <?php if($role==="root"): ?>
                    <?php foreach ($tablesroots as $tablesroot): ?>
                        <div class="col-md-3">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-text"><?= strtoupper(h($tablesroot->title)); ?></h4>
                                    <p class="card-text"><?= strtoupper(h($tablesroot->text)); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <?php
                                                echo $this->Html->link(
                                                    strtoupper($tablesroot->title),
                                                    $tablesroot->link,
                                                    ['class' => 'btn btn-sm btn-danger', 'style' => 'background-color: #fc7700' ]
                                                );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php elseif($role==="tubex"): ?>
                    <?php foreach ($tablestubex as $tablestube): ?>
                        <div class="col-md-3">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-text"><?= strtoupper(h($tablestube->title)); ?></h4>
                                    <p class="card-text"><?= strtoupper(h($tablestube->text)); ?></p>

                                    <?php if($tablestube->link == '/animes'): ?>
                                        <p><?php echo $animes.' '.$tablestube->title.' Registrados'; ?></p>
                                    <?php elseif($tablestube->link == '/films'):?>
                                        <p><?php echo $films.' '.$tablestube->title.' Registrados'; ?></p>
                                    <?php elseif($tablestube->link == '/series'):?>
                                        <p><?php echo $series.' '.$tablestube->title.' Registrados'; ?></p>
                                    <?php elseif($tablestube->link == '/comics'):?>
                                        <p><?php echo $comics.' '.$tablestube->title.' Registrados'; ?></p>
                                    <?php endif;?>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <?php
                                                echo $this->Html->link(
                                                    strtoupper($tablestube->title),
                                                    $tablestube->link,
                                                    ['class' => 'btn btn-sm btn-danger', 'style' => 'background-color: #fc7700' ]
                                                );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php elseif($role==="my_precious"): ?>
                    <div class="container-fluid">
                        <h4>General</h4>
                        <div class="row">
                            <?php foreach ($tables_myprecious_general as $tablesmyprecious): ?>
                                <div class="col-md-3">
                                    <div class="card mb-4 shadow-sm">
                                        <div class="card-body">
                                            <h4 class="card-text"><?= strtoupper(h($tablesmyprecious->title)); ?></h4>
                                            <p class="card-text"><?= strtoupper(h($tablesmyprecious->text)); ?></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <?php
                                                        echo $this->Html->link(
                                                            strtoupper($tablesmyprecious->title),
                                                            $tablesmyprecious->link,
                                                            ['class' => 'btn btn-sm btn-danger', 'style' => 'background-color: #fc7700' ]
                                                        );
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <h4>Finance Table</h4>
                        <div class="row">
                            <?php foreach ($tables_myprecious_manager as $tablesmyprecious): ?>
                                <div class="col-md-3">
                                    <div class="card mb-4 shadow-sm">
                                        <div class="card-body">
                                            <h4 class="card-text"><?= strtoupper(h($tablesmyprecious->title)); ?></h4>
                                            <p class="card-text"><?= strtoupper(h($tablesmyprecious->text)); ?></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <?php
                                                        echo $this->Html->link(
                                                            strtoupper($tablesmyprecious->title),
                                                            $tablesmyprecious->link,
                                                            ['class' => 'btn btn-sm btn-danger', 'style' => 'background-color: #fc7700' ]
                                                        );
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </main>
    <?php
        echo $this->Html->script('/bootstrap/js/docs/vendor/jquery-3.3.1.slim.min.js',
        [
            'integrity' => 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo',
            'crossorigin' => 'anonymous'
        ]);
        echo $this->Html->script('/bootstrap/js/docs/vendor/jquery-slim.min.js');
        echo $this->Html->script('/bootstrap/js/docs/vendor/bootstrap.bundle.js',
        [
            'integrity' => 'sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP',
            'crossorigin' => 'anonymous'
        ]);
    ?>
  </body>
</html>
