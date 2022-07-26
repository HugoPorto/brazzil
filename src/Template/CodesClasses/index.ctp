<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CodesClass[]|\Cake\Collection\CollectionInterface $codesClasses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Codes Class'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companys'), ['controller' => 'Companys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Menus'), ['controller' => 'StoresMenus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Menu'), ['controller' => 'StoresMenus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="codesClasses index large-9 medium-8 columns content">
    <h3><?= __('Codes Classes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stores_courses_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('companys_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stores_menus_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($codesClasses as $codesClass): ?>
            <tr>
                <td><?= $this->Number->format($codesClass->id) ?></td>
                <td><?= $codesClass->has('stores_course') ? $this->Html->link($codesClass->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $codesClass->stores_course->id]) : '' ?></td>
                <td><?= $codesClass->has('company') ? $this->Html->link($codesClass->company->id, ['controller' => 'Companys', 'action' => 'view', $codesClass->company->id]) : '' ?></td>
                <td><?= $codesClass->has('user') ? $this->Html->link($codesClass->user->name, ['controller' => 'Users', 'action' => 'view', $codesClass->user->id]) : '' ?></td>
                <td><?= h($codesClass->created) ?></td>
                <td><?= h($codesClass->modified) ?></td>
                <td><?= $codesClass->has('stores_menu') ? $this->Html->link($codesClass->stores_menu->id, ['controller' => 'StoresMenus', 'action' => 'view', $codesClass->stores_menu->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $codesClass->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $codesClass->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $codesClass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $codesClass->id)]) ?>
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
