<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresVideo $storesVideo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Video'), ['action' => 'edit', $storesVideo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Video'), ['action' => 'delete', $storesVideo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesVideo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Videos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Video'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesVideos view large-9 medium-8 columns content">
    <h3><?= h($storesVideo->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Video') ?></th>
            <td><?= h($storesVideo->video) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($storesVideo->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stores Course') ?></th>
            <td><?= $storesVideo->has('stores_course') ? $this->Html->link($storesVideo->stores_course->id, ['controller' => 'StoresCourses', 'action' => 'view', $storesVideo->stores_course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $storesVideo->has('user') ? $this->Html->link($storesVideo->user->name, ['controller' => 'Users', 'action' => 'view', $storesVideo->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesVideo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesVideo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesVideo->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($storesVideo->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Photo') ?></h4>
        <?= $this->Text->autoParagraph(h($storesVideo->photo)); ?>
    </div>
</div>
