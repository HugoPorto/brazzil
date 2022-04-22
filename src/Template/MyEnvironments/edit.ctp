<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MyEnvironment $myEnvironment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $myEnvironment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $myEnvironment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List My Environments'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="myEnvironments form large-9 medium-8 columns content">
    <?= $this->Form->create($myEnvironment) ?>
    <fieldset>
        <legend><?= __('Edit My Environment') ?></legend>
        <?php
            echo $this->Form->control('environment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
