<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresProduct $storesProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Categories'), ['controller' => 'StoresCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Category'), ['controller' => 'StoresCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($storesProduct) ?>
    <fieldset>
        <legend><?= __('Add Stores Product') ?></legend>
        <?php
            echo $this->Form->control('product');
            echo $this->Form->control('description');
            echo $this->Form->control('price');
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('stores_categories_id', ['options' => $storesCategories]);
            echo $this->Form->control('photo');
            echo $this->Form->control('quantity');
            echo $this->Form->control('active');
            echo $this->Form->control('online');
            echo $this->Form->control('barcode');
            echo $this->Form->control('qrcode');
            echo $this->Form->control('barcode_code');
            echo $this->Form->control('weight');
            echo $this->Form->control('package_format');
            echo $this->Form->control('package_lengths');
            echo $this->Form->control('package_height');
            echo $this->Form->control('package_width');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
