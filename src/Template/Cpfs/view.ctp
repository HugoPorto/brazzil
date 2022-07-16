<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cpf $cpf
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cpf'), ['action' => 'edit', $cpf->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cpf'), ['action' => 'delete', $cpf->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cpf->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cpfs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cpf'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cpfs view large-9 medium-8 columns content">
    <h3><?= h($cpf->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= h($cpf->cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $cpf->has('user') ? $this->Html->link($cpf->user->name, ['controller' => 'Users', 'action' => 'view', $cpf->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cpf->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cpf->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cpf->modified) ?></td>
        </tr>
    </table>
</div>
