<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MercadoPago $mercadoPago
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mercado Pago'), ['action' => 'edit', $mercadoPago->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mercado Pago'), ['action' => 'delete', $mercadoPago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mercadoPago->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mercado Pago'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mercado Pago'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mercadoPago view large-9 medium-8 columns content">
    <h3><?= h($mercadoPago->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Publick Key') ?></th>
            <td><?= h($mercadoPago->publick_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Private Key') ?></th>
            <td><?= h($mercadoPago->private_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $mercadoPago->has('user') ? $this->Html->link($mercadoPago->user->name, ['controller' => 'Users', 'action' => 'view', $mercadoPago->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mercadoPago->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($mercadoPago->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($mercadoPago->modified) ?></td>
        </tr>
    </table>
</div>
