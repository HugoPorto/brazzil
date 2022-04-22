<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCard $storesCard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storesCard->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storesCard->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stores Cards'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesCards form large-9 medium-8 columns content">
    <?= $this->Form->create($storesCard) ?>
    <fieldset>
        <legend><?= __('Edit Stores Card') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('number');
            echo $this->Form->control('date_expires');
            echo $this->Form->control('security_code');
            echo $this->Form->control('postal_code');
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
