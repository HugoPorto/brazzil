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
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>Admin</strong>
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
        <section class="jumbotron text-center" style="background-color: #fc7700; border-radius:0px">
            <div class="container" style="color: #fff">
                <h1 class="jumbotron-heading">SELECT AREA TO ADMIN</h1>
                <a href="/viewx" target="_blank" style="font-size: 30px; color: white" class="btn btn-dark">
                    <strong>COME BACK TO SITE</strong>
                </a>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($tablesamc as $tamc): ?>
                        <div class="col-md-3">
                            <div class="card mb-4 shadow-sm" style="border: 1px solid #fc7700;">
                                <div class="card-body">
                                    <h4 class="card-text"><?= strtoupper(h($tamc->title)); ?></h4>
                                    <p class="card-text"><?= strtoupper(h($tamc->text)); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <?php
                                                echo $this->Html->link(
                                                    strtoupper($tamc->title),
                                                    $tamc->link,
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
