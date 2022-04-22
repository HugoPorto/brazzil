<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresLogo $storesLogo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Logo'), ['action' => 'edit', $storesLogo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Logo'), ['action' => 'delete', $storesLogo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesLogo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Logos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Logo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesLogos view large-9 medium-8 columns content">
    <h3><?= h($storesLogo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><?= h($storesLogo->logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesLogo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesLogo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesLogo->modified) ?></td>
        </tr>
    </table>
</div>
