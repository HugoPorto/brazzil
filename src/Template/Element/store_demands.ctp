<section class="product">
    <div class="container">
        <div class="row">

        <?php if ($configs->show_type_products === 1) :?>
            <div class="col-md-8 col-lg-9 col-xs-12">
        <?php elseif ($configs->show_type_products === 2) :?>
            <div class="col-md-8 col-lg-12 col-xs-12">
        <?php endif;?>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('código') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($storesDemands as $storesDemand) : ?>
                            <tr>
                                <td><?= $this->Number->format($storesDemand->id) ?></td>
                                <td>
                                    <?php if ($storesDemand->status) : ?>
                                        Finalizado
                                    <?php else : ?>
                                        Processando
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?php $paginator = $this->Paginator->setTemplates(
                        [
                        'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'first' => '<li class="page-item"><a class="page-link" href="{{url}}">&laquo;</a></li>',
                        'last' => '<li class="page-item"><a class="page-link" href="{{url}}">&raquo;</a></li>',
                        'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">&lt;</a></li>',
                        'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">&gt;</a></li>',

                        ]
                    );?>

                <nav class="paginator" aria-label="Page navigation example">

                    <ul class="pagination justify-content-center"">

                        <?= $this->Paginator->first() ?>

                        <?php if ($this->Paginator->hasPrev()) : ?>
                            <?= $this->Paginator->prev() ?>

                        <?php endif; ?>

                        <?= $this->Paginator->numbers() ?>

                        <?php if ($this->Paginator->hasNext()) : ?>
                            <?= $this->Paginator->next() ?>

                        <?php endif; ?>
                        <?= $this->Paginator->last() ?>
                    </ul>

                </nav>


                </div>
            </div>

            <?php if ($configs->show_type_products === 1) :?>
            <div class="col-md-4 col-lg-3 col-xs-12 sidebar">

                <h4><?= __('Categorias') ?></h4>

                <ul class="list-group">

                    <?php foreach ($storesCategories as $storesCategory) : ?>
                        <li class="list-group-item">
                            <a href="<?= $this->request->base ?>/homes/store/<?= h($storesCategory->id) ?>"><i class="fa fa-dot-circle-o"></i><?= h($storesCategory->category) ?></a>
                        </li>

                    <?php endforeach; ?>

                </ul>
            </div>
            <?php endif;?>
        </div>
    </div>
</section>
