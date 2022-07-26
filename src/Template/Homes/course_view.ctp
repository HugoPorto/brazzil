<section class="single_item">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="single_item-img">
                    <img style="max-width: 5120px; min-width: 250px; max-height: 5120px; min-height: 250px;" <?= $storesCourse->photo; ?> />
                </div>
            </div>
            <div class="col-md-6">

                <div class="single_item-details">

                    <h2><?= $storesCourse->title ?></h2>

                    <span class="text-primary">R$<?= $storesCourse->price ?></span>

                    <h4 style="margin-top: 15px">Descrição</h4>

                    <p style="padding-top: 10px;">
                        <?= $storesCourse->course ?>
                    </p>

                    <p style="padding-top: 10px;">
                        <?= $storesCourse->description ?>
                    </p>

                    <form action="<?= $this->request->base; ?>/stores-carts/add" method="post">

                        <input type="hidden" name="quantity" value="1"/>

                        <input type="hidden" name="stores_courses_id" value="<?= $storesCourse->id ?>">

                        <input type="hidden" name="type_product" value="2">

                        <input type="hidden" name="users_id" value="<?= $idUser ?>"/>

                        <input
                            type="hidden"
                            class="form-control"
                            name="_csrfToken"
                            value="<?= $this->request->getParam('_csrfToken'); ?>"/>

                        <button class="btn btn-primary btn-default" type="submit">
                            <i class="fa fa-shopping-basket"></i> Adicionar ao carrinho
                        </button>

                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br>
                <h2>Ementa</h2>
                <br>
                <ul class="list-group no-border">
                    <?php foreach ($menus as $menu) : ?>
                        <li class="list-group-item"><?= $menu->menu ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
