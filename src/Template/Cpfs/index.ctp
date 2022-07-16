<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cpf[]|\Cake\Collection\CollectionInterface $cpfs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cpf'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cpfs index large-9 medium-8 columns content">
    <h3><?= __('Cpfs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cpfs as $cpf): ?>
            <tr>
                <td><?= $this->Number->format($cpf->id) ?></td>
                <td><?= h($cpf->cpf) ?></td>
                <td><?= $cpf->has('user') ? $this->Html->link($cpf->user->name, ['controller' => 'Users', 'action' => 'view', $cpf->user->id]) : '' ?></td>
                <td><?= h($cpf->created) ?></td>
                <td><?= h($cpf->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cpf->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cpf->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cpf->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cpf->id)]) ?>
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
