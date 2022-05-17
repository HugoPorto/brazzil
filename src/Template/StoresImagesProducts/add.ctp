<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresImagesProduct $storesImagesProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores Images Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesImagesProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($storesImagesProduct) ?>
    <fieldset>
        <legend><?= __('Add Stores Images Product') ?></legend>
        <?php
            echo $this->Form->control('photo');
            echo $this->Form->control('stores_products_id', ['options' => $storesProducts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
