<div class="col-lg-6 sidebar">

    <h3 class="bg-sand">Seu Carrinho | Total <span>R$<?= $total ?></span></h3>

    <?php foreach ($storesCarts as $storesCart) : ?>
        <div class="order-single">
            <div class="row">
                <div class="col-md-8">
                    <div class="cart_img">
                        <img width="114px" height="114px" <?= $storesCart->stores_product->photo ?> alt="cart">
                    </div>
                    <div class="cart_product-title">
                        <a href="store-single-product.html"><h5><?= $storesCart->stores_product->product ?></h5></a>
                        <span>Quantidade: <?= $storesCart->quantity ?></span>
                    </div>
                </div>
                <div class="col-md-4 price">
                    <span class="">R$<?= ($storesCart->stores_product->price * $storesCart->quantity) ?></span>
                    <?= $this->Form->postLink(
                        '<i class="fa fa-close"></i>',
                        ['action' => 'storeRemoveItemCart', $storesCart->id],
                        ['confirm' => __(
                            'Você realmente deseja remover esse item?',
                            $storesCart->id
                        ),
                                     'class' => 'close',
                                     'escape' => false]
                    ) ?>

                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <br>

    <h3>Calcular Frete</h3>

    <br>

    <form method="post" accept-charset="utf-8" action="<?= $this->request->base ?>/homes/calculateShipping">
        <div class="form-group row">

            <label for="example-text-input" class="col-md-2 col-form-label">CEP*</label>

            <div class="col-md-10">
                <input
                    class="form-control"
                    type="text"
                    name="cep"
                    value="<?= $cep ? $cep : '' ?>"
                    placeholder="CEP"
                    required>
            </div>

            <input
                type="hidden"
                class="form-control"
                name="_csrfToken"
                value="<?= $this->request->getParam('_csrfToken'); ?>"/>

            <?php if ($prazoEntrega) : ?>
                <div class="col-md-10" style="margin-top: 10px">
                    <p>Prazo Entrega: <?= $prazoEntrega ?> dia(s)</p>
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-info btn-default card-btn">Calcular Frete</button>
    </form>
</div>
