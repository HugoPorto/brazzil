<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCategory[]|\Cake\Collection\CollectionInterface $storesCategorys
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stores Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesCategorys index large-9 medium-8 columns content">
    <h3><?= __('Stores Categorys') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesCategorys as $storesCategory): ?>
            <tr>
                <td><?= $this->Number->format($storesCategory->id) ?></td>
                <td><?= h($storesCategory->category) ?></td>
                <td><?= $storesCategory->has('user') ? $this->Html->link($storesCategory->user->name, ['controller' => 'Users', 'action' => 'view', $storesCategory->user->id]) : '' ?></td>
                <td><?= h($storesCategory->created) ?></td>
                <td><?= h($storesCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storesCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesCategory->id)]) ?>
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
