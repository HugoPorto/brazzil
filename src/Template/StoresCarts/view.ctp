<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCart $storesCart
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Cart'), ['action' => 'edit', $storesCart->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Cart'), ['action' => 'delete', $storesCart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesCart->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Carts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Cart'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesCarts view large-9 medium-8 columns content">
    <h3><?= h($storesCart->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stores Product') ?></th>
            <td><?= $storesCart->has('stores_product') ? $this->Html->link($storesCart->stores_product->id, ['controller' => 'StoresProducts', 'action' => 'view', $storesCart->stores_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= h($storesCart->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $storesCart->has('user') ? $this->Html->link($storesCart->user->name, ['controller' => 'Users', 'action' => 'view', $storesCart->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesCart->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesCart->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesCart->modified) ?></td>
        </tr>
    </table>
</div>
