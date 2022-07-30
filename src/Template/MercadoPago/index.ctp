<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MercadoPago[]|\Cake\Collection\CollectionInterface $mercadoPago
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mercado Pago'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mercadoPago index large-9 medium-8 columns content">
    <h3><?= __('Mercado Pago') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('publick_key') ?></th>
                <th scope="col"><?= $this->Paginator->sort('private_key') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mercadoPago as $mercadoPago): ?>
            <tr>
                <td><?= $this->Number->format($mercadoPago->id) ?></td>
                <td><?= h($mercadoPago->publick_key) ?></td>
                <td><?= h($mercadoPago->private_key) ?></td>
                <td><?= $mercadoPago->has('user') ? $this->Html->link($mercadoPago->user->name, ['controller' => 'Users', 'action' => 'view', $mercadoPago->user->id]) : '' ?></td>
                <td><?= h($mercadoPago->created) ?></td>
                <td><?= h($mercadoPago->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mercadoPago->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mercadoPago->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mercadoPago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mercadoPago->id)]) ?>
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
