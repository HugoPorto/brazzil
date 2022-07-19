<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VideosViewed $videosViewed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Videos Viewed'), ['action' => 'edit', $videosViewed->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Videos Viewed'), ['action' => 'delete', $videosViewed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $videosViewed->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Videos Vieweds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Videos Viewed'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Videos'), ['controller' => 'StoresVideos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Video'), ['controller' => 'StoresVideos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="videosVieweds view large-9 medium-8 columns content">
    <h3><?= h($videosViewed->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $videosViewed->has('user') ? $this->Html->link($videosViewed->user->name, ['controller' => 'Users', 'action' => 'view', $videosViewed->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stores Course') ?></th>
            <td><?= $videosViewed->has('stores_course') ? $this->Html->link($videosViewed->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $videosViewed->stores_course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stores Video') ?></th>
            <td><?= $videosViewed->has('stores_video') ? $this->Html->link($videosViewed->stores_video->title, ['controller' => 'StoresVideos', 'action' => 'view', $videosViewed->stores_video->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($videosViewed->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($videosViewed->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($videosViewed->modified) ?></td>
        </tr>
    </table>
</div>
