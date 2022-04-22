<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCategory $storesCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Category'), ['action' => 'edit', $storesCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Category'), ['action' => 'delete', $storesCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Categorys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesCategorys view large-9 medium-8 columns content">
    <h3><?= h($storesCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($storesCategory->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $storesCategory->has('user') ? $this->Html->link($storesCategory->user->name, ['controller' => 'Users', 'action' => 'view', $storesCategory->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesCategory->modified) ?></td>
        </tr>
    </table>
</div>
