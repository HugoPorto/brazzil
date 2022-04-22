<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresSlider $storesSlider
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Slider'), ['action' => 'edit', $storesSlider->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Slider'), ['action' => 'delete', $storesSlider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesSlider->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Sliders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Slider'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesSliders view large-9 medium-8 columns content">
    <h3><?= h($storesSlider->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Slider') ?></th>
            <td><?= h($storesSlider->slider) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($storesSlider->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subtitle') ?></th>
            <td><?= h($storesSlider->subtitle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $storesSlider->has('user') ? $this->Html->link($storesSlider->user->name, ['controller' => 'Users', 'action' => 'view', $storesSlider->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesSlider->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storesSlider->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storesSlider->modified) ?></td>
        </tr>
    </table>
</div>
