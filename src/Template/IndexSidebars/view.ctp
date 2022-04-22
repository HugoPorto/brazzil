<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IndexSidebar $indexSidebar
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Index Sidebar'), ['action' => 'edit', $indexSidebar->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Index Sidebar'), ['action' => 'delete', $indexSidebar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $indexSidebar->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Index Sidebars'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Index Sidebar'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Category Sidebars'), ['controller' => 'CategorySidebars', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category Sidebar'), ['controller' => 'CategorySidebars', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="indexSidebars view large-9 medium-8 columns content">
    <h3><?= h($indexSidebar->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sidebar') ?></th>
            <td><?= h($indexSidebar->sidebar) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Icon') ?></th>
            <td><?= h($indexSidebar->icon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($indexSidebar->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $indexSidebar->has('role') ? $this->Html->link($indexSidebar->role->role, ['controller' => 'Roles', 'action' => 'view', $indexSidebar->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category Sidebar') ?></th>
            <td><?= $indexSidebar->has('category_sidebar') ? $this->Html->link($indexSidebar->category_sidebar->category, ['controller' => 'CategorySidebars', 'action' => 'view', $indexSidebar->category_sidebar->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $indexSidebar->has('user') ? $this->Html->link($indexSidebar->user->name, ['controller' => 'Users', 'action' => 'view', $indexSidebar->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($indexSidebar->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($indexSidebar->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($indexSidebar->modified) ?></td>
        </tr>
    </table>
</div>
