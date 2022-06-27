<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresTerm $storesTerm
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storesTerm->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storesTerm->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stores Terms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesTerms form large-9 medium-8 columns content">
    <?= $this->Form->create($storesTerm) ?>
    <fieldset>
        <legend><?= __('Edit Stores Term') ?></legend>
        <?php
            echo $this->Form->control('terms');
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
