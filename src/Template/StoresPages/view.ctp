<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresPage $storesPage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores Page'), ['action' => 'edit', $storesPage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores Page'), ['action' => 'delete', $storesPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesPage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Pages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores Page'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesPages view large-9 medium-8 columns content">
    <h3><?= h($storesPage->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($storesPage->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><?= h($storesPage->logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('About Title') ?></th>
            <td><?= h($storesPage->about_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team Title') ?></th>
            <td><?= h($storesPage->team_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Title') ?></th>
            <td><?= h($storesPage->contact_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price Title') ?></th>
            <td><?= h($storesPage->price_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storesPage->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('About') ?></h4>
        <?= $this->Text->autoParagraph(h($storesPage->about)); ?>
    </div>
    <div class="row">
        <h4><?= __('Mission') ?></h4>
        <?= $this->Text->autoParagraph(h($storesPage->mission)); ?>
    </div>
    <div class="row">
        <h4><?= __('About Subtitle') ?></h4>
        <?= $this->Text->autoParagraph(h($storesPage->about_subtitle)); ?>
    </div>
    <div class="row">
        <h4><?= __('Team Subtitle') ?></h4>
        <?= $this->Text->autoParagraph(h($storesPage->team_subtitle)); ?>
    </div>
    <div class="row">
        <h4><?= __('Contact Subtitle') ?></h4>
        <?= $this->Text->autoParagraph(h($storesPage->contact_subtitle)); ?>
    </div>
    <div class="row">
        <h4><?= __('Price Subtitle') ?></h4>
        <?= $this->Text->autoParagraph(h($storesPage->price_subtitle)); ?>
    </div>
</div>
