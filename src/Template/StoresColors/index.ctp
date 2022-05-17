<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresColor[]|\Cake\Collection\CollectionInterface $storesColors
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stores Color'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesColors index large-9 medium-8 columns content">
    <h3><?= __('Stores Colors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stores_products_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesColors as $storesColor): ?>
            <tr>
                <td><?= $this->Number->format($storesColor->id) ?></td>
                <td><?= h($storesColor->color) ?></td>
                <td><?= h($storesColor->created) ?></td>
                <td><?= h($storesColor->modified) ?></td>
                <td><?= $storesColor->has('stores_product') ? $this->Html->link($storesColor->stores_product->product, ['controller' => 'StoresProducts', 'action' => 'view', $storesColor->stores_product->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storesColor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesColor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesColor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesColor->id)]) ?>
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
