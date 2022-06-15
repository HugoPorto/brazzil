<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresPartner $storesPartner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Partner'), ['action' => 'edit', $storesPartner->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Partner'), ['action' => 'delete', $storesPartner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesPartner->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Partners'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Partner'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesPartners view large-9 medium-8 columns content">
    <h3><?= h($storesPartner->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Partner') ?></th>
            <td><?= h($storesPartner->partner) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $storesPartner->has('user') ? $this->Html->link($storesPartner->user->name, ['controller' => 'Users', 'action' => 'view', $storesPartner->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesPartner->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesPartner->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesPartner->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Photo') ?></h4>
        <?= $this->Text->autoParagraph(h($storesPartner->photo)); ?>
    </div>
</div>
