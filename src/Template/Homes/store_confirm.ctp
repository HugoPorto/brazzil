<?php $this->layout = false; ?>

<?php echo $this->element('store_head'); ?>

<body id="body" class="">

<?php echo $this->element('store_header'); ?>

<div class="main-wrapper home_transparent-wrapper @@active  confirm">

<div class="container confirm-details">
    <div class="iconic-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <strong><i class="fa fa-check"></i> Obrigado por seu pagamento! </strong>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 tags">
            <h3>O código do seu pedido é:</h3><span class="mt-2 mt-lg-0 d-inline-block"><?= $demandId ?></span>
        </div>
    </div>
</div>

<?php echo $this->element('store_contact'); ?>

<?php echo $this->element('store_footer'); ?>

