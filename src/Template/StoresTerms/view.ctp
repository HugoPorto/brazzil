<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresTerm $storesTerm
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Term'), ['action' => 'edit', $storesTerm->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Term'), ['action' => 'delete', $storesTerm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesTerm->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Terms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Term'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesTerms view large-9 medium-8 columns content">
    <h3><?= h($storesTerm->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $storesTerm->has('user') ? $this->Html->link($storesTerm->user->name, ['controller' => 'Users', 'action' => 'view', $storesTerm->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesTerm->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesTerm->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesTerm->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Terms') ?></h4>
        <?= $this->Text->autoParagraph(h($storesTerm->terms)); ?>
    </div>
</div>
