<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tablesroot $tablesroot
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tablesroot'), ['action' => 'edit', $tablesroot->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tablesroot'), ['action' => 'delete', $tablesroot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tablesroot->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tablesroots'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tablesroot'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tablesroots view large-9 medium-8 columns content">
    <h3><?= h($tablesroot->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($tablesroot->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Text') ?></th>
            <td><?= h($tablesroot->text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($tablesroot->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tablesroot->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tablesroot->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tablesroot->modified) ?></td>
        </tr>
    </table>
</div>
