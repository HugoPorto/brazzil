<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MyEnvironment $myEnvironment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit My Environment'), ['action' => 'edit', $myEnvironment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete My Environment'), ['action' => 'delete', $myEnvironment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $myEnvironment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List My Environments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New My Environment'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="myEnvironments view large-9 medium-8 columns content">
    <h3><?= h($myEnvironment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Environment') ?></th>
            <td><?= h($myEnvironment->environment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($myEnvironment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($myEnvironment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($myEnvironment->modified) ?></td>
        </tr>
    </table>
</div>
