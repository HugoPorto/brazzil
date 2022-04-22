<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresItemsDemand $storesItemsDemand
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storesItemsDemand->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storesItemsDemand->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stores Items Demands'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores Demands'), ['controller' => 'StoresDemands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Demand'), ['controller' => 'StoresDemands', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesItemsDemands form large-9 medium-8 columns content">
    <?= $this->Form->create($storesItemsDemand) ?>
    <fieldset>
        <legend><?= __('Edit Stores Items Demand') ?></legend>
        <?php
            echo $this->Form->control('stores_demands_id', ['options' => $storesDemands]);
            echo $this->Form->control('stores_products_id', ['options' => $storesProducts]);
            echo $this->Form->control('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
