<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresBudget $storesBudget
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storesBudget->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storesBudget->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stores Budgets'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesBudgets form large-9 medium-8 columns content">
    <?= $this->Form->create($storesBudget) ?>
    <fieldset>
        <legend><?= __('Edit Stores Budget') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('budget');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
