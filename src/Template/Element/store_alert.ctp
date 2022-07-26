<?php if (!empty($storesDemands->toArray())) :?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                Você possui pedidos que precisam ser processados. Clique <a href="<?= $this->request->base . '/stores-demands'?>">aqui</a> para verificar!
            </div>
        </div>
    </div>
<?php endif;?>

<?php if (!$company) :?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                Você ainda não possui uma empresa ativa. Clique <a href="<?= $this->request->base . '/companys'?>">aqui</a> para ativar uma!
            </div>
        </div>
    </div>
<?php endif;?>