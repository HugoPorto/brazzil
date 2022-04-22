<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImageProfile[]|\Cake\Collection\CollectionInterface $imageProfiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Image Profile'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Galerys'), ['controller' => 'Galerys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Galery'), ['controller' => 'Galerys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="imageProfiles index large-9 medium-8 columns content">
    <h3><?= __('Image Profiles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($imageProfiles as $imageProfile): ?>
            <tr>
                <td><?= $this->Number->format($imageProfile->id) ?></td>
                <td><?= h($imageProfile->image) ?></td>
                <td><?= $imageProfile->has('user') ? $this->Html->link($imageProfile->user->name, ['controller' => 'Users', 'action' => 'view', $imageProfile->user->id]) : '' ?></td>
                <td><?= h($imageProfile->created) ?></td>
                <td><?= h($imageProfile->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $imageProfile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $imageProfile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $imageProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imageProfile->id)]) ?>
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
