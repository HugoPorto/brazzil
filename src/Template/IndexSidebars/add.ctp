<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IndexSidebar $indexSidebar
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Index Sidebars'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Category Sidebars'), ['controller' => 'CategorySidebars', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category Sidebar'), ['controller' => 'CategorySidebars', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="indexSidebars form large-9 medium-8 columns content">
    <?= $this->Form->create($indexSidebar) ?>
    <fieldset>
        <legend><?= __('Add Index Sidebar') ?></legend>
        <?php
            echo $this->Form->control('sidebar');
            echo $this->Form->control('icon');
            echo $this->Form->control('url');
            echo $this->Form->control('roles_id', ['options' => $roles]);
            echo $this->Form->control('category_sidebars_id', ['options' => $categorySidebars]);
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
