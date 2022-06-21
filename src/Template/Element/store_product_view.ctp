<section class="single_item">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                
                <?php if (sizeof($imagesExtrasProduct->toArray()) < 1) :?>
                    <div class="single_item-img">
                        <img style="max-width: 500px; min-width: 250px; max-height: 500px; min-height: 250px;" <?= $storesProduct->photo; ?> />
                    </div>
                <?php else :?>
                    <div class="slider">
                        <div class="slides">
                            <input type="radio" name="radio-btn" id="radio1">
                            <input type="radio" name="radio-btn" id="radio2">
                            <input type="radio" name="radio-btn" id="radio3">
                            <input type="radio" name="radio-btn" id="radio4">
                            <input type="radio" name="radio-btn" id="radio5">
                            <?php foreach ($imagesExtrasProduct as $key => $images) :?>
                                    <?php if ($images->photo !== 'Null') :?>
                                        <input type="radio" name="radio-btn" id="radio<?= $key + 2 ?>">
                                    <?php endif ;?>
                            <?php endforeach; ?>

                            <div class="slide first">
                                <img <?= $storesProduct->photo; ?> alt="Imagem 1">
                            </div>

                            <?php foreach ($imagesExtrasProduct as $key => $images) :?>
                                <?php if ($images->photo !== 'Null') :?>
                                    <div class="slide">
                                        <img <?= $images->photo ?> alt="Imagem <?= $key + 2 ?>">
                                    </div>
                                <?php endif ;?>
                            <?php endforeach; ?>

                            <div class="navigation-auto">
                                <div class="auto-btn1"></div>
                                <?php foreach ($imagesExtrasProduct as $key => $images) :?>
                                    <?php if ($images->photo !== 'Null') :?>
                                        <div class="auto-btn<?= $key + 2 ?>"></div>
                                    <?php endif ;?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="manual-navigation">
                            <label for="radio1" class="manual-btn">
                                <img <?= $storesProduct->photo; ?>
                            </label>

                            <?php foreach ($imagesExtrasProduct as $key => $images) :?>
                                <?php if ($images->photo !== 'Null') :?>
                                    <label for="radio<?= $key + 2 ?>" class="manual-btn">
                                        <img <?= $images->photo ?>>
                                    </label>
                                <?php endif ;?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif ;?>
            </div>
            <div class="col-md-6">

                <div class="single_item-details">

                    <h2><?= $storesProduct->product ?></h2>

                    <span class="text-primary">R$<?= $storesProduct->price ?></span>

                    <h4 style="margin-top: 15px">Descrição</h4>

                    <p style="padding-top: 10px;">
                        <?= $storesProduct->description ?>
                    </p>

                    <?php foreach ($storesColors as $storesColor) : ?>
                        <?php if ($storesColor->color2 && $storesColor->color3) : ?>
                            <a href="<?= $this->request->base ?>/homes/product-view/<?= $storesColor->stores_products_id ?>/<?= $storesColor->id ?>/<?= $storesColor->product_flag_code ?>" class="btn" 
                            style="background-color: <?= $storesColor->color ?>; 
                                background-image: linear-gradient(<?= $storesColor->color ?>, <?= $storesColor->color2 ?>, <?= $storesColor->color3 ?>);
                                !important; border-radius: 10px; border: 1px solid #d7d7d7"></a>
                        <?php elseif ($storesColor->color && $storesColor->color2) : ?>
                            <a href="<?= $this->request->base ?>/homes/product-view/<?= $storesColor->stores_products_id ?>/<?= $storesColor->id ?>/<?= $storesColor->product_flag_code ?>" class="btn" 
                            style="background-color: <?= $storesColor->color ?>; 
                                background-image: linear-gradient(<?= $storesColor->color ?>, <?= $storesColor->color2 ?>);
                                !important; border-radius: 10px; border: 1px solid #d7d7d7"></a>
                        <?php else : ?>
                            <a href="<?= $this->request->base ?>/homes/product-view/<?= $storesColor->stores_products_id ?>/<?= $storesColor->id ?>/<?= $storesColor->product_flag_code ?>" class="btn" 
                            style="background-color: <?= $storesColor->color ?> !important; border-radius: 10px; border: 1px solid #d7d7d7"></a>
                        <?php endif; ?>

                        
                    <?php endforeach; ?>

                    <form action="<?= $this->request->base; ?>/stores-carts/add" method="post">
                        <?= $this->Flash->render() ?>

                        <input type="number" name="quantity" value="1">

                        <input type="hidden" name="stores_products_id" value="<?= $storesProduct->id ?>">

                        <input type="hidden" name="type_product" value="1">

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
        <div class="row">
            <div class="col-sm-8 offset-sm-2 col-xs-12 text-center">
                <div class="sectionTitle">
                    <span class="h4">Veja Também</span>
                    <h2>Alguns Produtos Relacionados</h2>
                </div>
                <div class="seperator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="seperator-icon" viewBox="0 0 169.6 192.6">
                        <path d="M79.9 96.3l2.4-4.2h4.9l2.4 4.2-2.4 4.2h-4.9l-2.4-4.2zM82.2 0v14.1l-5.8-5.8-3.8 3.8 9.6 9.6v7.4l-9.6-9.6-3.8 3.8 13.4 13.4V44L69.1 30.8l-3.8 3.8 16.9 16.9v7L66.6 43l-3.8 3.8 19.4 19.4v25.3l-22-12.7-7.1-26.6-5.2 1.4 5.7 21.3-6.1-3.5-6.2-23.1-5.2 1.4 4.8 17.9-6.3-3.6-4.9-18.4-5.2 1.4L28 60.3l-6.4-3.7-3.5-13.1-5.2 1.4 2.1 7.9-12-6.9-.3-.2L0 50.4l12.2 7-7.9 2.1 1.4 5.2 13.1-3.5 6.4 3.7-13.1 3.5 1.4 5.2 18.4-4.9 6.3 3.6-17.9 4.8 1.4 5.2 23.1-6.2 6.1 3.5-21.3 5.7 1.4 5.2 26.6-7.1 21.9 12.7-22 12.7-26.6-7.1-1.4 5.2 21.3 5.7-6.1 3.5-23.1-6.1-1.4 5.2 17.9 4.8-6.3 3.6-18.4-4.9L12 124l13.1 3.5-6.4 3.7-13.1-3.5-1.4 5.2 7.9 2.1-11.9 6.9-.2.1 2.7 4.7 12.2-7-2.1 7.9L18 149l3.5-13.1 6.4-3.7-3.5 12.8-.1.3 5.2 1.4 4.9-18.4 6.3-3.6-4.7 17.6-.1.3 5.2 1.4 6.2-23.1 6.1-3.5-5.6 21.1-.1.3 5.2 1.4 7.1-26.6 22-12.7v25.4l-19.4 19.4 3.8 3.8L82 134v7l-16.9 16.9 3.8 3.8L82 148.6v7.3l-13.4 13.4 3.8 3.8 9.6-9.6v7.4l-9.6 9.6 3.8 3.8 5.8-5.8v14.1h5.4v-14.1l5.8 5.8 3.8-3.8-9.6-9.6v-7.4l9.6 9.6 3.8-3.8-13.4-13.4v-7.3l13.1 13.1 3.8-3.8L87.4 141v-7l15.6 15.6 3.8-3.8-19.4-19.4V101l22 12.7 7.1 26.6 5.2-1.4-5.7-21.3 6.1 3.5 6.2 23.1 5.2-1.4-4.8-17.9 6.3 3.6 4.9 18.4 5.2-1.4-3.5-13.1 6.4 3.7 3.5 13.1 5.2-1.4-2.1-7.9 11.9 6.9.3.2 2.7-4.7-12.2-7 7.9-2.1-1.4-5.2-13.1 3.5-6.4-3.7 13.1-3.5-1.4-5.2-18.4 4.9-6.3-3.6 17.9-4.8-1.4-5.2-23.1 6.2-6.1-3.5 21.3-5.7-1.4-5.2-26.6 7.1-21.7-12.9 22-12.7 26.6 7.1 1.4-5.2-21.3-5.7 6.1-3.5 23.1 6.2 1.4-5.2-17.9-4.8 6.3-3.6 18.4 4.9 1.4-5.2-13.1-3.5 6.4-3.7 13.1 3.5 1.4-5.2-7.9-2.1 11.9-6.9.3-.2-2.7-4.7-12.2 7L157 45l-5.2-1.4-3.5 13.1-6.4 3.7 3.4-12.8.1-.3-5.2-1.4-4.9 18.4-6.3 3.6 4.7-17.6.1-.3-5.2-1.4-6.2 23.1-6.1 3.5 5.6-21.1.1-.3-5.2-1.4-7.3 26.6-21.9 12.7V66.3L107 46.8l-3.8-3.8-15.6 15.6v-7l16.9-16.9-3.8-3.8L87.6 44v-7.3L101 23.3l-3.8-3.8-9.6 9.6v-7.4l9.6-9.6-3.8-3.8-5.8 5.8V0h-5.4z"></path>
                    </svg>

                </div>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($relationshipProducts->toArray())) : ?>
                <?php foreach ($relationshipProducts as $storesProduct) : ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card product-card">
                            <div class="card_img">
                                <img class="img-fluid" style="margin: auto; display: block;" <?= $storesProduct->photo; ?> />

                                <div class="hover-overlay">
                                    <?= $this->Html->link(
                                        __('<i class="fa fa-shopping-basket"></i>'),
                                        ['action' => 'productView', $storesProduct->id],
                                        ['class' => 'overlay_icon right', 'escape' => false]
                                    ) ?>

                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?= $this->request->base ?>/homes/productView/<?= $storesProduct->id; ?>"><h4 class="card-title"><?= $storesProduct->product; ?></h4></a>
                                <span class="text-info">R$<?= $storesProduct->price; ?></span>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
