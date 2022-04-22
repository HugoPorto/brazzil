<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresItemsDemand $storesItemsDemand
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Items Demand'), ['action' => 'edit', $storesItemsDemand->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Items Demand'), ['action' => 'delete', $storesItemsDemand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesItemsDemand->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Items Demands'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Items Demand'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Demands'), ['controller' => 'StoresDemands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Demand'), ['controller' => 'StoresDemands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesItemsDemands view large-9 medium-8 columns content">
    <h3><?= h($storesItemsDemand->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stores Demand') ?></th>
            <td><?= $storesItemsDemand->has('stores_demand') ? $this->Html->link($storesItemsDemand->stores_demand->id, ['controller' => 'StoresDemands', 'action' => 'view', $storesItemsDemand->stores_demand->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stores Product') ?></th>
            <td><?= $storesItemsDemand->has('stores_product') ? $this->Html->link($storesItemsDemand->stores_product->id, ['controller' => 'StoresProducts', 'action' => 'view', $storesItemsDemand->stores_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= h($storesItemsDemand->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesItemsDemand->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesItemsDemand->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesItemsDemand->modified) ?></td>
        </tr>
    </table>
</div>
