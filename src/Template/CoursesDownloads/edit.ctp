<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoursesDownload $coursesDownload
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coursesDownload->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coursesDownload->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Courses Downloads'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Videos'), ['controller' => 'StoresVideos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Video'), ['controller' => 'StoresVideos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companys'), ['controller' => 'Companys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="coursesDownloads form large-9 medium-8 columns content">
    <?= $this->Form->create($coursesDownload) ?>
    <fieldset>
        <legend><?= __('Edit Courses Download') ?></legend>
        <?php
            echo $this->Form->control('link');
            echo $this->Form->control('stores_courses_id', ['options' => $storesCourses]);
            echo $this->Form->control('stores_videos_id', ['options' => $storesVideos]);
            echo $this->Form->control('description');
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('companys_id', ['options' => $companys]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
