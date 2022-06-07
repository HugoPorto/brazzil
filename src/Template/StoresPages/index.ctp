<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresPage[]|\Cake\Collection\CollectionInterface $storesPages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stores Page'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesPages index large-9 medium-8 columns content">
    <h3><?= __('Stores Pages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('about_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price_title') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesPages as $storesPage): ?>
            <tr>
                <td><?= $this->Number->format($storesPage->id) ?></td>
                <td><?= h($storesPage->title) ?></td>
                <td><?= h($storesPage->logo) ?></td>
                <td><?= h($storesPage->about_title) ?></td>
                <td><?= h($storesPage->team_title) ?></td>
                <td><?= h($storesPage->contact_title) ?></td>
                <td><?= h($storesPage->price_title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storesPage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesPage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesPage->id)]) ?>
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
