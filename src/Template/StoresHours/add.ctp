<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresHour $storesHour
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores Hours'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesHours form large-9 medium-8 columns content">
    <?= $this->Form->create($storesHour) ?>
    <fieldset>
        <legend><?= __('Add Stores Hour') ?></legend>
        <?php
            echo $this->Form->control('hour');
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
