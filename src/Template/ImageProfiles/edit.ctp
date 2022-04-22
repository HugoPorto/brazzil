<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImageProfile $imageProfile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $imageProfile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $imageProfile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Image Profiles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Galerys'), ['controller' => 'Galerys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Galery'), ['controller' => 'Galerys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="imageProfiles form large-9 medium-8 columns content">
    <?= $this->Form->create($imageProfile) ?>
    <fieldset>
        <legend><?= __('Edit Image Profile') ?></legend>
        <?php
            echo $this->Form->control('image');
            echo $this->Form->control('galerys_id', ['options' => $galerys]);
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
