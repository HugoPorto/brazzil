<?php
$cakeDescription = 'Focux';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
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

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
  </head>
  <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Sobre está sessão</h4>
              <p class="text-muted">Aqui você vai poder gerenciar a área do site e poder visualizar outros itens no sistema.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Sair</h4>
              <ul class="list-unstyled">
              <li>
                  <?php
                      if($username){
                          echo $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']);
                      }
                  ?>
              </li>
              <li>
                <?php
                    if($username){
                        echo $this->Html->link(__('Registro de Itens(Tabelas Novas)'), ['controller' => 'Tablesadmins', 'action' => 'add']);
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
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
  </header>
  <body>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
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
