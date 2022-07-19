<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VideosViewed $videosViewed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Videos Vieweds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Videos'), ['controller' => 'StoresVideos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Video'), ['controller' => 'StoresVideos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="videosVieweds form large-9 medium-8 columns content">
    <?= $this->Form->create($videosViewed) ?>
    <fieldset>
        <legend><?= __('Add Videos Viewed') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('stores_courses_id', ['options' => $storesCourses]);
            echo $this->Form->control('stores_videos_id', ['options' => $storesVideos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
