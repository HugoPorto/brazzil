<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Brazzil Commerce CMS
    </title>
    <?= $this->element('datatables_package');?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('default.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <link rel="shortcut icon" href="<?php echo $this->request->webroot . 'img/favicon-32x32.png';?>">
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation" style="background-color: black">
        <ul class="title-area large-3 medium-4 columns" style="background-color: black">
            <li class="name">
                <h1 style="color: white">OHNIK</h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
            <li>
                <?php

                if ($username) {
                    echo $this->Html->link(__('Admin'), ['controller' => 'Users', 'action' => 'mainmenu'], ['style' => 'background-color: #000']);
                }

                ?>
            </li>
            <li>
                <?php

                if ($username) {
                    echo $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout'], ['style' => 'background-color: #000']);
                }

                ?>
            </li>
            </ul>
        </div>
    </nav>

    <?= $this->Flash->render() ?>

    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->element('datatables_script_run'); ?>
</body>
</html>
