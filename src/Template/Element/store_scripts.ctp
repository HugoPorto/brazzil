<?php

    echo $this->Html->script(
        [
            '/vue/vue.min.js',
            '/axios/axios.min.js',
            '/page_scripts/site.js',
            '/Store/assets/plugins/jquery/jquery-3.3.1.min.js',
            '/Store/assets/plugins/jquery-ui/jquery-ui.min.js',
            '/Store/assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
            '/Store/assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js',
            '/Store/assets/plugins/slick/slick.min.js',
            '/Store/assets/plugins/fancybox/jquery.fancybox.min.js',
            '/Store/assets/plugins/circle-progress/jquery.appear.js',
            '/Store/assets/plugins/isotope/isotope.min.js',
            '/Store/assets/plugins/datepicker/bootstrap-datepicker.min.js',
            '/Store/assets/plugins/counterUp/counterup.min.js',
            '/Store/assets/plugins/syotimer/jquery.syotimer.min.js',
            '/Store/assets/plugins/daterangepicker/js/moment.min.js',
            '/Store/assets/plugins/daterangepicker/js/daterangepicker.min.js',
            '/Store/assets/plugins/images-loaded/js/imagesloaded.pkgd.min.js',
            '/Store/assets/plugins/no-ui-slider/nouislider.min.js',
            '/Store/assets/js/store.js',
        ]
    );

    if ($this->request->controller === 'Homes' && $this->request->action === 'productView') {
        echo $this->Html->script('/page_scripts/pure.js');
    }

    ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU79W1lu5f6PIiuMqNfT1C6M0e_lq1ECY"></script>
