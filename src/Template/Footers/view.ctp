<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Footer $footer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Footer'), ['action' => 'edit', $footer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Footer'), ['action' => 'delete', $footer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $footer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Footers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Footer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="footers view large-9 medium-8 columns content">
    <h3><?= h($footer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($footer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($footer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($footer->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Footer') ?></h4>
        <?= $this->Text->autoParagraph(h($footer->footer)); ?>
    </div>
</div>
