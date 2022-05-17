<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresImagesProduct[]|\Cake\Collection\CollectionInterface $storesImagesProducts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stores Images Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesImagesProducts index large-9 medium-8 columns content">
    <h3><?= __('Stores Images Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stores_products_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesImagesProducts as $storesImagesProduct): ?>
            <tr>
                <td><?= $this->Number->format($storesImagesProduct->id) ?></td>
                <td><?= $storesImagesProduct->has('stores_product') ? $this->Html->link($storesImagesProduct->stores_product->product, ['controller' => 'StoresProducts', 'action' => 'view', $storesImagesProduct->stores_product->id]) : '' ?></td>
                <td><?= h($storesImagesProduct->created) ?></td>
                <td><?= h($storesImagesProduct->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storesImagesProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesImagesProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesImagesProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesImagesProduct->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
