<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresColor $storesColor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Color'), ['action' => 'edit', $storesColor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Color'), ['action' => 'delete', $storesColor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesColor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Colors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Color'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesColors view large-9 medium-8 columns content">
    <h3><?= h($storesColor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= h($storesColor->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stores Product') ?></th>
            <td><?= $storesColor->has('stores_product') ? $this->Html->link($storesColor->stores_product->product, ['controller' => 'StoresProducts', 'action' => 'view', $storesColor->stores_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Flag Code') ?></th>
            <td><?= h($storesColor->product_flag_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesColor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesColor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesColor->modified) ?></td>
        </tr>
    </table>
</div>
