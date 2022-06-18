<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresComment $storesComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Comment'), ['action' => 'edit', $storesComment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Comment'), ['action' => 'delete', $storesComment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesComment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Comments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Comment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesComments view large-9 medium-8 columns content">
    <h3><?= h($storesComment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stores Product') ?></th>
            <td><?= $storesComment->has('stores_product') ? $this->Html->link($storesComment->stores_product->product, ['controller' => 'StoresProducts', 'action' => 'view', $storesComment->stores_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $storesComment->has('user') ? $this->Html->link($storesComment->user->name, ['controller' => 'Users', 'action' => 'view', $storesComment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesComment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesComment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesComment->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($storesComment->comment)); ?>
    </div>
</div>
