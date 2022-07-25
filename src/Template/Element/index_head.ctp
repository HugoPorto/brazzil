<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $storesPagesTitles->title ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <?= $this->Html->css(
        [
            '/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css',
            'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
            '/AdminLTE-3.1.0/dist/css/adminlte.min.css',
            '/AdminLTE-3.1.0/plugins/select2/css/select2.min.css',
            '/AdminLTE-3.1.0/plugins/daterangepicker/daterangepicker.css',
            '/AdminLTE-3.1.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
            '/AdminLTE-3.1.0/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
            '/AdminLTE-3.1.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
            '/AdminLTE-3.1.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
            '/AdminLTE-3.1.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
            '/AdminLTE-3.1.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
            '/AdminLTE-3.1.0/plugins/bs-stepper/css/bs-stepper.min.css',
            '/AdminLTE-3.1.0/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css',
            '/AdminLTE-3.1.0/plugins/dropzone/min/dropzone.min.css',
            '/AdminLTE-3.1.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css',
            '/AdminLTE-3.1.0/plugins/toastr/toastr.min.css',
            '/AdminLTE-3.1.0/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
            '/css/index_style.css'
        ]
    );?>

    <?= $this->Html->meta('icon', 'img/favicon.png', ['type' => 'image/png']) ?>

</head>
