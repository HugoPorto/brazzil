<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresMenu $storesMenu
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Menu'), ['action' => 'edit', $storesMenu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Menu'), ['action' => 'delete', $storesMenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesMenu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Menus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Menu'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companys'), ['controller' => 'Companys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companys', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesMenus view large-9 medium-8 columns content">
    <h3><?= h($storesMenu->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Menu') ?></th>
            <td><?= h($storesMenu->menu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stores Course') ?></th>
            <td><?= $storesMenu->has('stores_course') ? $this->Html->link($storesMenu->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $storesMenu->stores_course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $storesMenu->has('user') ? $this->Html->link($storesMenu->user->name, ['controller' => 'Users', 'action' => 'view', $storesMenu->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $storesMenu->has('company') ? $this->Html->link($storesMenu->company->id, ['controller' => 'Companys', 'action' => 'view', $storesMenu->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesMenu->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesMenu->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesMenu->modified) ?></td>
        </tr>
    </table>
</div>
