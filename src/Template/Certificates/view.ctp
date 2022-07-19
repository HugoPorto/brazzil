<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Certificate $certificate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Certificate'), ['action' => 'edit', $certificate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Certificate'), ['action' => 'delete', $certificate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $certificate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Certificates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Certificate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="certificates view large-9 medium-8 columns content">
    <h3><?= h($certificate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Stores Course') ?></th>
            <td><?= $certificate->has('stores_course') ? $this->Html->link($certificate->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $certificate->stores_course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $certificate->has('user') ? $this->Html->link($certificate->user->name, ['controller' => 'Users', 'action' => 'view', $certificate->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($certificate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($certificate->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($certificate->modified) ?></td>
        </tr>
    </table>
</div>
