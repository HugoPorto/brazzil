<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CodesClass $codesClass
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Codes Class'), ['action' => 'edit', $codesClass->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Codes Class'), ['action' => 'delete', $codesClass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $codesClass->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Codes Classes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Codes Class'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companys'), ['controller' => 'Companys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companys', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Menus'), ['controller' => 'StoresMenus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Menu'), ['controller' => 'StoresMenus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="codesClasses view large-9 medium-8 columns content">
    <h3><?= h($codesClass->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stores Course') ?></th>
            <td><?= $codesClass->has('stores_course') ? $this->Html->link($codesClass->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $codesClass->stores_course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $codesClass->has('company') ? $this->Html->link($codesClass->company->id, ['controller' => 'Companys', 'action' => 'view', $codesClass->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $codesClass->has('user') ? $this->Html->link($codesClass->user->name, ['controller' => 'Users', 'action' => 'view', $codesClass->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stores Menu') ?></th>
            <td><?= $codesClass->has('stores_menu') ? $this->Html->link($codesClass->stores_menu->id, ['controller' => 'StoresMenus', 'action' => 'view', $codesClass->stores_menu->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($codesClass->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($codesClass->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($codesClass->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Code') ?></h4>
        <?= $this->Text->autoParagraph(h($codesClass->code)); ?>
    </div>
</div>
