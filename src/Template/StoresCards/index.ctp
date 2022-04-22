<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCard[]|\Cake\Collection\CollectionInterface $storesCards
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stores Card'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesCards index large-9 medium-8 columns content">
    <h3><?= __('Stores Cards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_expires') ?></th>
                <th scope="col"><?= $this->Paginator->sort('security_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postal_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesCards as $storesCard): ?>
            <tr>
                <td><?= $this->Number->format($storesCard->id) ?></td>
                <td><?= h($storesCard->name) ?></td>
                <td><?= h($storesCard->number) ?></td>
                <td><?= h($storesCard->date_expires) ?></td>
                <td><?= h($storesCard->security_code) ?></td>
                <td><?= h($storesCard->postal_code) ?></td>
                <td><?= $storesCard->has('user') ? $this->Html->link($storesCard->user->name, ['controller' => 'Users', 'action' => 'view', $storesCard->user->id]) : '' ?></td>
                <td><?= h($storesCard->created) ?></td>
                <td><?= h($storesCard->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storesCard->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesCard->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesCard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesCard->id)]) ?>
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
