<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresContact $storesContact
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores Contacts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesContacts form large-9 medium-8 columns content">
    <?= $this->Form->create($storesContact) ?>
    <fieldset>
        <legend><?= __('Add Stores Contact') ?></legend>
        <?php
            echo $this->Form->control('contact');
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
