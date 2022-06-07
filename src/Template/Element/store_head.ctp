<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <title><?= $storesPagesTitles->title ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        echo $this->Html->charset();
        echo $this->Html->css(
            [
                '/Store/assets/plugins/jquery-ui/jquery-ui.min.css',
                '/Store/assets/plugins/bootstrap/css/bootstrap.min.css',
                '/Store/assets/plugins/font-awesome/css/font-awesome.min.css',
                '/Store/assets/plugins/selectbox/select_option1.css',
                '/Store/assets/plugins/slick/slick.css',
                '/Store/assets/plugins/slick/slick-theme.css',
                '/Store/assets/plugins/prismjs/prism.css',
                '/Store/assets/plugins/fancybox/jquery.fancybox.min.css',
                '/Store/assets/plugins/isotope/isotope.min.css',
                '/Store/assets/plugins/animate/animate.css',
                '/Store/assets/plugins/daterangepicker/css/daterangepicker.css',
                '/Store/assets/plugins/no-ui-slider/nouislider.min.css',
                '/Store/assets/css/store.css',
                '/Store/assets/css/default.css'
            ]
        );

        ?>

    <link rel="shortcut icon" href="<?php echo $this->request->webroot . 'img/favicon.png';?>">

    <style type="text/css">
        

</style>

</head>
