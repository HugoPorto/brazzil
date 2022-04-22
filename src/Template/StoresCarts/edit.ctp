<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCart $storesCart
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storesCart->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storesCart->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stores Carts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesCarts form large-9 medium-8 columns content">
    <?= $this->Form->create($storesCart) ?>
    <fieldset>
        <legend><?= __('Edit Stores Cart') ?></legend>
        <?php
            echo $this->Form->control('stores_products_id', ['options' => $storesProducts]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
