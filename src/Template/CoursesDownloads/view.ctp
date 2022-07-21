<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoursesDownload $coursesDownload
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Courses Download'), ['action' => 'edit', $coursesDownload->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Courses Download'), ['action' => 'delete', $coursesDownload->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesDownload->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses Downloads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Courses Download'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Videos'), ['controller' => 'StoresVideos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Video'), ['controller' => 'StoresVideos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companys'), ['controller' => 'Companys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companys', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="coursesDownloads view large-9 medium-8 columns content">
    <h3><?= h($coursesDownload->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($coursesDownload->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stores Course') ?></th>
            <td><?= $coursesDownload->has('stores_course') ? $this->Html->link($coursesDownload->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $coursesDownload->stores_course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stores Video') ?></th>
            <td><?= $coursesDownload->has('stores_video') ? $this->Html->link($coursesDownload->stores_video->title, ['controller' => 'StoresVideos', 'action' => 'view', $coursesDownload->stores_video->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $coursesDownload->has('user') ? $this->Html->link($coursesDownload->user->name, ['controller' => 'Users', 'action' => 'view', $coursesDownload->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $coursesDownload->has('company') ? $this->Html->link($coursesDownload->company->id, ['controller' => 'Companys', 'action' => 'view', $coursesDownload->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($coursesDownload->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($coursesDownload->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($coursesDownload->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($coursesDownload->description)); ?>
    </div>
</div>
