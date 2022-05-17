<div class="sidebar">

    <?php echo $this->element('index_user_panel'); ?>

    <?php if ($username) :?>
        <?php if ($role == 'storeAdmin') :?>
            <nav class="mt-2">

                <ul class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false">

                    <?php foreach ($indexSidebars as $indexSidebar) : ?>
                        <?php if ($indexSidebar->role->role === 'storeAdmin') :?>
                            <?php if ($indexSidebar->category_sidebar->category === 'general') :?>
                                <li class="nav-item">

                                    <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>" class="nav-link">

                                        <i class="<?= $indexSidebar->icon ?>"></i>

                                        <p><?= $indexSidebar->sidebar?></p>

                                    </a>

                                </li>
                            <?php endif;?>
                        <?php endif;?>
                    <?php endforeach; ?>
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
        <?php endif; ?>
    <?php endif; ?>
</div>
