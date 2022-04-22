<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresMessage $storesMessage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores Messages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesMessages form large-9 medium-8 columns content">
    <?= $this->Form->create($storesMessage) ?>
    <fieldset>
        <legend><?= __('Add Stores Message') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('message');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
