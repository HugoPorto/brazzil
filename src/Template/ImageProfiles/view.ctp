<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImageProfile $imageProfile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Image Profile'), ['action' => 'edit', $imageProfile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Image Profile'), ['action' => 'delete', $imageProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imageProfile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Image Profiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image Profile'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Galerys'), ['controller' => 'Galerys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Galery'), ['controller' => 'Galerys', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="imageProfiles view large-9 medium-8 columns content">
    <h3><?= h($imageProfile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td>
                <?php

                    echo $this->Html->image('galerys/' . $imageProfile->galerys_id . '/' . $imageProfile->image);

                 ?>

            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Galery') ?></th>
            <td><?= $imageProfile->has('galery') ? $this->Html->link($imageProfile->galery->title, ['controller' => 'Galerys', 'action' => 'view', $imageProfile->galery->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $imageProfile->has('user') ? $this->Html->link($imageProfile->user->name, ['controller' => 'Users', 'action' => 'view', $imageProfile->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($imageProfile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($imageProfile->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($imageProfile->modified) ?></td>
        </tr>
    </table>
</div>
