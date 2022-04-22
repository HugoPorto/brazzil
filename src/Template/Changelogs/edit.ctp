<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Changelog $changelog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $changelog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $changelog->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Changelogs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="changelogs form large-9 medium-8 columns content">
    <?= $this->Form->create($changelog) ?>
    <fieldset>
        <legend><?= __('Edit Changelog') ?></legend>
        <?php
            echo $this->Form->control('changelog');
            echo $this->Form->control('icon');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
