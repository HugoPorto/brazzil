<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresAddres $storesAddres
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores Address'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores Demands'), ['controller' => 'StoresDemands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Demand'), ['controller' => 'StoresDemands', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesAddress form large-9 medium-8 columns content">
    <?= $this->Form->create($storesAddres) ?>
    <fieldset>
        <legend><?= __('Add Stores Addres') ?></legend>
        <?php
            echo $this->Form->control('address');
            echo $this->Form->control('district');
            echo $this->Form->control('city');
            echo $this->Form->control('reference');
            echo $this->Form->control('number');
            echo $this->Form->control('cep');
            echo $this->Form->control('stores_demands_id', ['options' => $storesDemands]);
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
