<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresConfig[]|\Cake\Collection\CollectionInterface $storesConfigs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stores Config'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesConfigs index large-9 medium-8 columns content">
    <h3><?= __('Stores Configs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cep') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesConfigs as $storesConfig): ?>
            <tr>
                <td><?= $this->Number->format($storesConfig->id) ?></td>
                <td><?= h($storesConfig->cep) ?></td>
                <td><?= $storesConfig->has('user') ? $this->Html->link($storesConfig->user->name, ['controller' => 'Users', 'action' => 'view', $storesConfig->user->id]) : '' ?></td>
                <td><?= h($storesConfig->created) ?></td>
                <td><?= h($storesConfig->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storesConfig->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesConfig->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesConfig->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesConfig->id)]) ?>
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
