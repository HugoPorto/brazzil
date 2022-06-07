<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresPage $storesPage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storesPage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storesPage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stores Pages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesPages form large-9 medium-8 columns content">
    <?= $this->Form->create($storesPage) ?>
    <fieldset>
        <legend><?= __('Edit Stores Page') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('logo');
            echo $this->Form->control('about');
            echo $this->Form->control('mission');
            echo $this->Form->control('about_title');
            echo $this->Form->control('about_subtitle');
            echo $this->Form->control('team_title');
            echo $this->Form->control('team_subtitle');
            echo $this->Form->control('contact_title');
            echo $this->Form->control('contact_subtitle');
            echo $this->Form->control('price_title');
            echo $this->Form->control('price_subtitle');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
