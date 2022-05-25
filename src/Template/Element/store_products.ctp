<section class="product">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-lg-9 col-xs-12">
                <div class="row">

                    <?php if (!empty($storesProducts->toArray())) : ?>
                        <?php foreach ($storesProducts as $storesProduct) : ?>
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

                    <?php else : ?>
                        <div class="col-md-6 col-lg-6">
                            <div class="card product-card">

                                <h3>Não foram encontrados registros.</h3>

                            </div>
                        </div>
                    <?php endif; ?>

                </div>

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

                <div class="row">
                    <div class="col-md-12">
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


            </div>
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
        </div>
    </div>
</section>
