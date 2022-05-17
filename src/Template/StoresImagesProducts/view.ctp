<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresImagesProduct $storesImagesProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Images Product'), ['action' => 'edit', $storesImagesProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Images Product'), ['action' => 'delete', $storesImagesProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesImagesProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Images Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Images Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Products'), ['controller' => 'StoresProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Product'), ['controller' => 'StoresProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesImagesProducts view large-9 medium-8 columns content">
    <h3><?= h($storesImagesProduct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stores Product') ?></th>
            <td><?= $storesImagesProduct->has('stores_product') ? $this->Html->link($storesImagesProduct->stores_product->product, ['controller' => 'StoresProducts', 'action' => 'view', $storesImagesProduct->stores_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesImagesProduct->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesImagesProduct->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesImagesProduct->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Photo') ?></h4>
        <?= $this->Text->autoParagraph(h($storesImagesProduct->photo)); ?>
    </div>
</div>
