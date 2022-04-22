<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresConfig $storesConfig
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Config'), ['action' => 'edit', $storesConfig->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Config'), ['action' => 'delete', $storesConfig->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesConfig->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Configs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Config'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesConfigs view large-9 medium-8 columns content">
    <h3><?= h($storesConfig->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cep') ?></th>
            <td><?= h($storesConfig->cep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $storesConfig->has('user') ? $this->Html->link($storesConfig->user->name, ['controller' => 'Users', 'action' => 'view', $storesConfig->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesConfig->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesConfig->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesConfig->modified) ?></td>
        </tr>
    </table>
</div>
