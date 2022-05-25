<section class="product_section bg-sand">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 col-xs-12 text-center">
                <div class="sectionTitle">
                    <h2>Alguns de Nossos Produtos</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($storesProducts as $storesProduct) : ?>
                <div class="col-md-6 col-lg-2">
                    <div class="card product-card">
                        <div class="card_img" style="background-color: white;">
                            <img class="img-fluid" style="margin: auto; display: block;"<?= $storesProduct->photo; ?> />
                            <div class="hover-overlay">
                                <?= $this->Html->link(
                                    __('<i class="fa fa-shopping-basket"></i>'),
                                    ['action' => 'productView', $storesProduct->id],
                                    ['class' => 'overlay_icon right', 'escape' => false]
                                ) ?>

                            </div>
                        </div>
                        <div class="card-body">
                            <a href="homes/productView/<?= $storesProduct->id; ?>"><h4 class="card-title"><?= $storesProduct->product; ?></h4></a>
                            <span class="text-info">R$<?= $storesProduct->price; ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
