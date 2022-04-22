<?php
$this->layout = false;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>
        <?= $title; ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
    echo $this->Html->css('/bootstrap/css/bootstrap.min.css',
        [
            'integrity' => 'anonymous'
        ]
    );
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
                        if($username){
                            echo $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']);
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
            <a href="/viewx/admin" class="navbar-brand d-flex align-items-center">
                <strong>Admin TubeX</strong>
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
  <body>
    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($tablestubex as $tablestube): ?>
                        <div class="col-md-3">
                            <div class="card mb-4 shadow-sm" style="border: 1px solid #fc7700;">
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
                </div>
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
