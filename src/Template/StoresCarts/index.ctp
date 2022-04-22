<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCart[]|\Cake\Collection\CollectionInterface $storesCarts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stores Cart'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesCarts index large-9 medium-8 columns content">
    <h3><?= __('Stores Carts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stores_products_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesCarts as $storesCart): ?>
            <tr>
                <td><?= $this->Number->format($storesCart->id) ?></td>
                <td><?= $storesCart->has('stores_product') ? $this->Html->link($storesCart->stores_product->id, ['controller' => 'StoresProducts', 'action' => 'view', $storesCart->stores_product->id]) : '' ?></td>
                <td><?= h($storesCart->quantity) ?></td>
                <td><?= $storesCart->has('user') ? $this->Html->link($storesCart->user->name, ['controller' => 'Users', 'action' => 'view', $storesCart->user->id]) : '' ?></td>
                <td><?= h($storesCart->created) ?></td>
                <td><?= h($storesCart->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storesCart->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesCart->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesCart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesCart->id)]) ?>
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
