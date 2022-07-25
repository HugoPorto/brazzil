<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresMenu[]|\Cake\Collection\CollectionInterface $storesMenus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stores Menu'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companys'), ['controller' => 'Companys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesMenus index large-9 medium-8 columns content">
    <h3><?= __('Stores Menus') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('menu') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stores_courses_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('companys_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesMenus as $storesMenu): ?>
            <tr>
                <td><?= $this->Number->format($storesMenu->id) ?></td>
                <td><?= h($storesMenu->menu) ?></td>
                <td><?= $storesMenu->has('stores_course') ? $this->Html->link($storesMenu->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $storesMenu->stores_course->id]) : '' ?></td>
                <td><?= $storesMenu->has('user') ? $this->Html->link($storesMenu->user->name, ['controller' => 'Users', 'action' => 'view', $storesMenu->user->id]) : '' ?></td>
                <td><?= $storesMenu->has('company') ? $this->Html->link($storesMenu->company->id, ['controller' => 'Companys', 'action' => 'view', $storesMenu->company->id]) : '' ?></td>
                <td><?= h($storesMenu->created) ?></td>
                <td><?= h($storesMenu->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storesMenu->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesMenu->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesMenu->id)]) ?>
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
