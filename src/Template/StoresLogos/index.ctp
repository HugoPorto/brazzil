<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresLogo[]|\Cake\Collection\CollectionInterface $storesLogos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stores Logo'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesLogos index large-9 medium-8 columns content">
    <h3><?= __('Stores Logos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesLogos as $storesLogo): ?>
            <tr>
                <td><?= $this->Number->format($storesLogo->id) ?></td>
                <td><?= h($storesLogo->logo) ?></td>
                <td><?= h($storesLogo->created) ?></td>
                <td><?= h($storesLogo->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storesLogo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesLogo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesLogo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesLogo->id)]) ?>
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
