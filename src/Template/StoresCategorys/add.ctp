<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCategory $storesCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores Categorys'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesCategorys form large-9 medium-8 columns content">
    <?= $this->Form->create($storesCategory) ?>
    <fieldset>
        <legend><?= __('Add Stores Category') ?></legend>
        <?php
            echo $this->Form->control('category');
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
