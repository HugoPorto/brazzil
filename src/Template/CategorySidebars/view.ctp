<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategorySidebar $categorySidebar
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category Sidebar'), ['action' => 'edit', $categorySidebar->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category Sidebar'), ['action' => 'delete', $categorySidebar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categorySidebar->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Category Sidebars'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category Sidebar'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorySidebars view large-9 medium-8 columns content">
    <h3><?= h($categorySidebar->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($categorySidebar->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($categorySidebar->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($categorySidebar->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($categorySidebar->modified) ?></td>
        </tr>
    </table>
</div>
