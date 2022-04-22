<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCard $storesCard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Card'), ['action' => 'edit', $storesCard->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Card'), ['action' => 'delete', $storesCard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesCard->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Cards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Card'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesCards view large-9 medium-8 columns content">
    <h3><?= h($storesCard->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($storesCard->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number') ?></th>
            <td><?= h($storesCard->number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Expires') ?></th>
            <td><?= h($storesCard->date_expires) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Security Code') ?></th>
            <td><?= h($storesCard->security_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postal Code') ?></th>
            <td><?= h($storesCard->postal_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $storesCard->has('user') ? $this->Html->link($storesCard->user->name, ['controller' => 'Users', 'action' => 'view', $storesCard->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesCard->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesCard->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesCard->modified) ?></td>
        </tr>
    </table>
</div>
