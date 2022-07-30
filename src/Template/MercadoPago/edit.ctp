<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MercadoPago $mercadoPago
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mercadoPago->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mercadoPago->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mercado Pago'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mercadoPago form large-9 medium-8 columns content">
    <?= $this->Form->create($mercadoPago) ?>
    <fieldset>
        <legend><?= __('Edit Mercado Pago') ?></legend>
        <?php
            echo $this->Form->control('publick_key');
            echo $this->Form->control('private_key');
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
