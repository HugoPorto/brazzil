<!-- REQUIRED SCRIPTS -->
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/jquery/jquery.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/dist/js/adminlte.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/dist/js/demo.js';?>"></script>

<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/select2/js/select2.full.min.js';?>"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-responsive/js/dataTables.responsive.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-buttons/js/dataTables.buttons.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/jszip/jszip.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/pdfmake/pdfmake.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/pdfmake/vfs_fonts.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.html5.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.print.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.colVis.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/plugins/chart.js/Chart.min.js';?>"></script>
<script src="<?php echo $this->request->webroot . 'AdminLTE-3.1.0/dist/js/pages/dashboard3.js';?>"></script>

<script>
  $(function () {

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $("#general").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "order": [[ 0, "desc" ]],
      "language": {
            // "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
            "url": "<?= $this->request->base ?>/datatables/Portuguese-Brasil.json"
        },
    });
  });
</script>

<?php
    echo $this->Html->script(
        [
            '/vue/vue.min.js',
            '/axios/axios.min.js',
            '/page_scripts/index.js',
        ]
    );
    ?>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
