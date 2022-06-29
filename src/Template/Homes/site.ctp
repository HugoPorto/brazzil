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
            <?php if ($configs->show_type_products === 1) :?>
                <?php foreach ($storesProducts as $StoresProduct) : ?>
                    <div class="col-md-6 col-lg-2">
                        <div class="card product-card">
                            <div class="card_img" style="background-color: white;">
                                <img class="img-fluid" style="margin: auto; display: block;"<?= $StoresProduct->photo; ?> />
                                <div class="hover-overlay">
                                    <?= $this->Html->link(
                                        __('<i class="fa fa-shopping-basket"></i>'),
                                        ['action' => 'productView', $StoresProduct->id],
                                        ['class' => 'overlay_icon right', 'escape' => false]
                                    ) ?>

                                </div>
                            </div>
                            <div class="card-body">
                                <a href="homes/productView/<?= $StoresProduct->id; ?>">
                                    <h4 class="card-title"><?= $StoresProduct->product; ?></h4>
                                </a>
                                <span class="text-info">R$<?= $StoresProduct->price; ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php elseif ($configs->show_type_products === 2) :?>
                <?php foreach ($StoresCourses as $StoresCourse) : ?>
                    <div class="col-md-6 col-lg-2">
                        <div class="card product-card">
                            <div class="card_img" style="background-color: white;">
                                <img class="img-fluid" style="margin: auto; display: block;"<?= $StoresCourse->photo; ?> />
                                <div class="hover-overlay">
                                    <?= $this->Html->link(
                                        __('<i class="fa fa-shopping-basket"></i>'),
                                        ['action' => 'courseView', $StoresCourse->id],
                                        ['class' => 'overlay_icon right', 'escape' => false]
                                    ) ?>

                                </div>
                            </div>
                            <div class="card-body">
                                <a href="homes/courseView/<?= $StoresCourse->id; ?>"><h4 class="card-title"><?= $StoresCourse->title; ?></h4></a>
                                <span class="text-info">R$<?= $StoresCourse->price; ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php if (sizeof($storesPartners->toArray())) :?>
    <section class="brand_carousel bg-primary">
        <div class="container">
            <div class="slick_brands">
                <?php foreach ($storesPartners as $storesPartner) : ?>
                    <div class="brand_single">
                        <div class="brand_img">
                            <img style="width: 174px;" <?= $storesPartner->photo ?>/>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif;?>