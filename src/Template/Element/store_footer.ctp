    <footer class="footer bg-footer">
        <?php if ($configs->show_type_products === 2) :?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img style="width: 180px;" src="<?= $this->request->webroot . 'img/garantia.jpg'?>" class="mx-auto d-block">
                    </div>
                </div> 
            </div>
        <?php endif;?>
        <div class="container" style="padding-top: 50px;">
            <div class="row">
                <?php if ($configs->show_type_products === 2) :?>
                    <div class="col-md-6 offset-md-3">
                        <form class="newsletter text-center" 
                            action="<?= $this->request->base . '/certificates/verify' ?>" 
                            method="post" style="padding-top: 0px;">
                                <h3 class="col-8 offset-2 text-center">Verificar Um Certificado</h3>
                                <input class="clearfix" type="text" required="true" name="certificate" placeholder="Código do Certificado">
                                <input
                                    type="hidden"
                                    class="form-control"
                                    name="_csrfToken"
                                    value="<?= $this->request->getParam('_csrfToken'); ?>"/>
                                <button type="submit" class="btn btn-primary btn-default">Buscar</button>
                        </form>
                    </div>
                <?php endif;?>
                <div class="col-md-6 offset-md-3">
                    <ul class="list-inline socialLink text-center">
                        <li class="list-inline-item"><a href="<?= $facebook_link ?>" 
                            target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

                        <li class="list-inline-item"><a href="<?= $instagram_link ?>" 
                            target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-6 offset-md-3">
                    <div class="copyRight_text text-center">
                        <p><?= $storesFooters->footer; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php echo $this->element('store_whatsapp'); ?>

<?php echo $this->element('store_scripts'); ?>

</body>

</html>
