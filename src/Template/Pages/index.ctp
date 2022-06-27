<?php // echo $this->element('store_charts'); ?>

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
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 bg-success" 
            onmouseover="mouseOverWhatsapp()" 
            onclick="mouseWhatsappClick()" 
            id="whatsapp">
            <span class="info-box-icon"><i class="fab fa-whatsapp"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Atualizar Número do Whatsapp</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 bg-primary" 
            onmouseover="mouseOverFacebook()" 
            onclick="mouseFacebookClick()" 
            id="facebook">
            <span class="info-box-icon"><i class="fab fa-facebook-square"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Atualizar Link do Facebook</span>
            </div>
        </div>
    </div>

    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3" 
            style="background-color: #912EB9; color: white;" 
            onmouseover="mouseOverInstagram()" 
            onclick="mouseInstagramClick()" 
            id="instagram">
            <span class="info-box-icon"><i class="fab fa-instagram"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Atualizar Link do Instagram</span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 bg-danger"
            onmouseover="mouseOverUpdateBannerPromotion()" 
            onclick="redirectPromotionBanner()" 
            id="promotion">
            <span class="info-box-icon"><i class="fas fa-file-upload"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Banner Promocional</span>
            </div>
        </div>
    </div>

    <!-- <div class="col-12 col-sm-6 col-md-1">
        <a href="">
            <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="fab fa-twitter"></i></span>
            </div>
        </a>
    </div> -->
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Usuários</h3>
    </div>
    <div class="card-body">
        <table id="general" class="table table-bordered table-striped" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><strong><?= h($user->name) ?></strong></td>
                    <td><?= h($user->lastname) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->cellphone) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
