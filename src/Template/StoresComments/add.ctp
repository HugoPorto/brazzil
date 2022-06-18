<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresComment $storesComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores Comments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesComments form large-9 medium-8 columns content">
    <?= $this->Form->create($storesComment) ?>
    <fieldset>
        <legend><?= __('Add Stores Comment') ?></legend>
        <?php
            echo $this->Form->control('comment');
            echo $this->Form->control('stores_products_id', ['options' => $storesProducts]);
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
