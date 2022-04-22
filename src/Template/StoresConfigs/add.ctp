<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresConfig $storesConfig
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores Configs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesConfigs form large-9 medium-8 columns content">
    <?= $this->Form->create($storesConfig) ?>
    <fieldset>
        <legend><?= __('Add Stores Config') ?></legend>
        <?php
            echo $this->Form->control('cep');
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
