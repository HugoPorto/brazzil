<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MyEnvironment[]|\Cake\Collection\CollectionInterface $myEnvironments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New My Environment'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="myEnvironments index large-9 medium-8 columns content">
    <h3><?= __('My Environments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('environment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($myEnvironments as $myEnvironment): ?>
            <tr>
                <td><?= $this->Number->format($myEnvironment->id) ?></td>
                <td><?= h($myEnvironment->environment) ?></td>
                <td><?= h($myEnvironment->created) ?></td>
                <td><?= h($myEnvironment->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $myEnvironment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $myEnvironment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $myEnvironment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $myEnvironment->id)]) ?>
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
