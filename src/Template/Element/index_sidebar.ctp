<div class="sidebar">

    <?php if ($configs->show_type_products !== 2) :?>
        <?= $this->element('index_user_panel') ?>
    <?php endif;?>

    <?php if ($username) :?>
        <?php if ($role == 'storeAdmin') :?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Empresas<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                <?php if ($indexSidebar->role->role === 'storeAdmin') :?>
                                    <?php if ($indexSidebar->category_sidebar->category === 'companys') :?>
                                        <li class="nav-item">

                                            <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>" 
                                                class="nav-link">

                                                <i class="<?= $indexSidebar->icon ?>"></i>

                                                <p><?= $indexSidebar->sidebar?></p>

                                            </a>

                                        </li>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Cadastros<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                <?php if ($indexSidebar->role->role === 'storeAdmin') :?>
                                    <?php if ($indexSidebar->category_sidebar->category === 'general') :?>
                                        <li class="nav-item">

                                            <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>" 
                                                class="nav-link">

                                                <i class="<?= $indexSidebar->icon ?>"></i>

                                                <p><?= $indexSidebar->sidebar?></p>

                                            </a>

                                        </li>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Produtos Digitais<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                <?php if ($indexSidebar->role->role === 'storeAdmin') :?>
                                    <?php if ($indexSidebar->category_sidebar->category === 'digital products') :?>
                                        <li class="nav-item">

                                            <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>" 
                                                class="nav-link">

                                                <i class="<?= $indexSidebar->icon ?>"></i>

                                                <p><?= $indexSidebar->sidebar?></p>

                                            </a>

                                        </li>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Front<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                <?php if ($indexSidebar->role->role === 'storeAdmin') :?>
                                    <?php if ($indexSidebar->category_sidebar->category === 'front') :?>
                                        <li class="nav-item">

                                            <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>" class="nav-link">

                                                <i class="<?= $indexSidebar->icon ?>"></i>

                                                <p><?= $indexSidebar->sidebar?></p>

                                            </a>

                                        </li>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Configurações<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                <?php if ($indexSidebar->role->role === 'storeAdmin') :?>
                                    <?php if ($indexSidebar->category_sidebar->category === 'settings') :?>
                                        <li class="nav-item">

                                            <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>" class="nav-link">

                                                <i class="<?= $indexSidebar->icon ?>"></i>

                                                <p><?= $indexSidebar->sidebar?></p>

                                            </a>

                                        </li>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </nav>
        <?php elseif ($role == 'store') :?>
            <?php if ($configs->show_type_products === 2) :?>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview"
                        role="menu"
                        data-accordion="false">

                        <li class="nav-item menu-is-opening menu-open">
                            <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: block;">
                                <li class="nav-item">
                                    <a href="<?= $this->request->base . '/stores-courses/courses'?>" class="nav-link active">
                                        <i class="nav-icon fas fa-link text-info"></i>
                                        <p>Cursos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= $this->request->base . '/certificates'?>" class="nav-link">
                                        <i class="nav-icon fas fa-link text-info"></i>
                                        <p>Certificados</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</div>
