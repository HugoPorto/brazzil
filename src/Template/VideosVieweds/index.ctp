<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VideosViewed[]|\Cake\Collection\CollectionInterface $videosVieweds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Videos Viewed'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Videos'), ['controller' => 'StoresVideos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Video'), ['controller' => 'StoresVideos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="videosVieweds index large-9 medium-8 columns content">
    <h3><?= __('Videos Vieweds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stores_courses_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stores_videos_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($videosVieweds as $videosViewed): ?>
            <tr>
                <td><?= $this->Number->format($videosViewed->id) ?></td>
                <td><?= $videosViewed->has('user') ? $this->Html->link($videosViewed->user->name, ['controller' => 'Users', 'action' => 'view', $videosViewed->user->id]) : '' ?></td>
                <td><?= $videosViewed->has('stores_course') ? $this->Html->link($videosViewed->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $videosViewed->stores_course->id]) : '' ?></td>
                <td><?= $videosViewed->has('stores_video') ? $this->Html->link($videosViewed->stores_video->title, ['controller' => 'StoresVideos', 'action' => 'view', $videosViewed->stores_video->id]) : '' ?></td>
                <td><?= h($videosViewed->created) ?></td>
                <td><?= h($videosViewed->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $videosViewed->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $videosViewed->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $videosViewed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $videosViewed->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
