<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Changelog $changelog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Changelog'), ['action' => 'edit', $changelog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Changelog'), ['action' => 'delete', $changelog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changelog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Changelogs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Changelog'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="changelogs view large-9 medium-8 columns content">
    <h3><?= h($changelog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Icon') ?></th>
            <td><?= h($changelog->icon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($changelog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($changelog->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($changelog->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Changelog') ?></h4>
        <?= $this->Text->autoParagraph(h($changelog->changelog)); ?>
    </div>
</div>
