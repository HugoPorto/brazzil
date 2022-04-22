<?php echo $this->element('home_head'); ?>

<body id="main">

    <?php echo $this->element('home_preloader'); ?>

    <?php echo $this->element('home_header'); ?>

    <?= $this->fetch('content') ?>

    <?php echo $this->element('home_footer'); ?>

	<script type="text/javascript" src="<?php echo $this->request->webroot.'himu/js/jquery.js';?>"></script>
	<script type="text/javascript" src="<?php echo $this->request->webroot.'himu/js/bootstrap.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo $this->request->webroot.'himu/js/smoothscroll.js';?>"></script>
	<script type="text/javascript" src="<?php echo $this->request->webroot.'himu/js/jquery.isotope.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo $this->request->webroot.'himu/js/jquery.prettyPhoto.js';?>"></script>
	<script type="text/javascript" src="<?php echo $this->request->webroot.'himu/js/jquery.parallax.js';?>"></script>
	<script type="text/javascript" src="<?php echo $this->request->webroot.'himu/js/main.js';?>"></script>

    <?php
        echo $this->Html->script(
            [
                '/vue/vue.min.js',
                '/axios/axios.min.js',
                '/page_scripts/index_home.js',
            ]);
    ?>
</body>
</html>
