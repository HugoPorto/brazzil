<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresVideo $storesVideo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storesVideo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storesVideo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stores Videos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesVideos form large-9 medium-8 columns content">
    <?= $this->Form->create($storesVideo) ?>
    <fieldset>
        <legend><?= __('Edit Stores Video') ?></legend>
        <?php
            echo $this->Form->control('video');
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('stores_courses_id', ['options' => $storesCourses]);
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('photo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
