<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresTerm[]|\Cake\Collection\CollectionInterface $storesTerms
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stores Term'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesTerms index large-9 medium-8 columns content">
    <h3><?= __('Stores Terms') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesTerms as $storesTerm): ?>
            <tr>
                <td><?= $this->Number->format($storesTerm->id) ?></td>
                <td><?= h($storesTerm->created) ?></td>
                <td><?= h($storesTerm->modified) ?></td>
                <td><?= $storesTerm->has('user') ? $this->Html->link($storesTerm->user->name, ['controller' => 'Users', 'action' => 'view', $storesTerm->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storesTerm->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesTerm->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesTerm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesTerm->id)]) ?>
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
