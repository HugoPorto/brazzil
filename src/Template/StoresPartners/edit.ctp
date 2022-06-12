<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresPartner $storesPartner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storesPartner->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storesPartner->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stores Partners'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesPartners form large-9 medium-8 columns content">
    <?= $this->Form->create($storesPartner) ?>
    <fieldset>
        <legend><?= __('Edit Stores Partner') ?></legend>
        <?php
            echo $this->Form->control('partner');
            echo $this->Form->control('logo');
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
