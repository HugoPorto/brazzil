<section class="single_item">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="single_item-img">
                    <img style="max-width: 500px; min-width: 250px; max-height: 500px; min-height: 250px;" <?= $storesProduct->photo; ?> />
                </div>
            </div>
            <div class="col-md-6">

                <div class="single_item-details">

                    <h2><?= $storesProduct->product ?></h2>

                    <span class="text-primary">R$<?= $storesProduct->price ?></span>

                    <h4 style="margin-top: 15px">Descrição</h4>

                    <p style="padding-top: 10px;">
                        <?= $storesProduct->description ?>
                    </p>

                    <form action="<?= $this->request->base; ?>/stores-carts/add" method="post">
                        <?= $this->Flash->render() ?>

                        <input type="number" name="quantity" value="1">

                        <input type="hidden" name="stores_products_id" value="<?= $storesProduct->id ?>">

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

                    <p>Categoria: <a href="#"><?= $storesProduct->stores_category->category ?></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
