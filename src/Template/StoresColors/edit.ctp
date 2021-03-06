<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresColor $storesColor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storesColor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storesColor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stores Colors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesColors form large-9 medium-8 columns content">
    <?= $this->Form->create($storesColor) ?>
    <fieldset>
        <legend><?= __('Edit Stores Color') ?></legend>
        <?php
            echo $this->Form->control('color');
            echo $this->Form->control('stores_products_id', ['options' => $storesProducts, 'empty' => true]);
            echo $this->Form->control('product_flag_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
