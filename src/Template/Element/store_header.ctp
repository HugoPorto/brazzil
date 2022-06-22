<header id="pageTop" class="header">
    <nav class="navbar navbar-expand-md main-nav">
        <div class=" container">
            <button
                class="navbar-toggler  navbar-toggler-right"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="burger-menu icon-toggle"><i class="fa fa-bars"></i></span>

            </button>

            <a class="navbar-brand" href="<?= $this->request->base . '/site' ?> ">
                <img src="<?= $this->request->webroot . 'img/galerys/13/' . $storesLogo; ?>" alt="Logomarca"></a>

            <p>Site em Construção</p>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->request->base; ?>/homes/store">Todos os Produtos</a>
                    </li>

                    <?php foreach ($storesCategories as $key => $category) : ?>
                        <?php if ($category->status_menu) :?>
                            <li class=" dropdown megaDropMenu nav-item ">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false" 
                                href="javascript:void(0)" onclick="link()"><?= $category->category ?></a>

                                <ul class="row dropdown-menu">

                                <?php foreach ($storesSubcategories as $key => $subcategory) : ?>
                                    <?php if ($category->id === $subcategory->stores_categories_id) :?>
                                        <li class="col-md-4 col-xs-12">
                                            <span><b><?= $subcategory->subcategory ?></b></span>
                                            <hr>
                                            <ul class="list-unstyled">
                                                <?php foreach ($storesFinalcategories as $key => $finalcategory) : ?>
                                                    <?php if ($subcategory->id === $finalcategory->stores_subcategories_id) :?>
                                                        <li>
                                                            <?= $this->Html->link(
                                                                $finalcategory->category,
                                                                [
                                                                    'controller' => 'homes',
                                                                    'action' => 'search', $category->id, $subcategory->id, $finalcategory->id
                                                                ]
                                                            ) ?>
                                                        </li>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                    <?php endif;?>
                                <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif;?>
                    <?php endforeach; ?>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo $this->request->base; ?>/homes/storeContact">Contato</a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="btn-search btn-src nav-link"><i class="fa fa-search"></i></a>

                        <form
                            class="search_form"
                            action="<?php echo $this->request->base; ?>/homes/search"
                            method="get">
                            <input type="text" required="true" name="search" placeholder="Buscar..">
                            <button class="btn btn-info btn-small" type="submit">Buscar</button>
                        </form>
                    </li>

                    <?php if ($username) :?>
                        <?php if ($role === 'store' || $role === 'storeAdmin') :?>
                            <li class="nav-item dropdown drop_single ">
                                <a class="nav-link dropdown-toggle"
                                    data-toggle="dropdown"
                                    role="button"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    href="javascript:void(0)"><?=$username;?>
                                </a>
                                <ul class="dropdown-menu dd_first">
                                    <?php if ($role === 'store') :?>
                                        <li>
                                            <?php echo $this->Html->link(__('Meus Pedidos'), ['controller' => 'homes', 'action' => 'demands'], ['class' => '']);?>
                                        </li>
                                        <?php if ($configs->show_type_products === 2) :?>
                                            <?php echo $this->Html->link(__('Área do Aluno'), ['controller' => 'storesCourses', 'action' => 'courses'], ['class' => '']);?>
                                        <?php endif;?>
                                    <?php endif;?>
                                    <li>
                                        <?php echo $this->Html->link(__('Sair'), ['controller' => 'users', 'action' => 'logout'], ['class' => '']);?>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                    <?php else : ?>
                        <li class="nav-item ">
                            <?php echo $this->Html->link(__('Entrar'), ['controller' => 'users', 'action' => 'login'], ['class' => 'nav-link']);?>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <?php echo $this->element('store_header_cart'); ?>

        </div>
    </nav>
</header>
