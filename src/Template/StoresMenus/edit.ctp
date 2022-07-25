<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresMenu $storesMenu
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storesMenu->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storesMenu->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stores Menus'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companys'), ['controller' => 'Companys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companys', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesMenus form large-9 medium-8 columns content">
    <?= $this->Form->create($storesMenu) ?>
    <fieldset>
        <legend><?= __('Edit Stores Menu') ?></legend>
        <?php
            echo $this->Form->control('menu');
            echo $this->Form->control('stores_courses_id', ['options' => $storesCourses]);
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('companys_id', ['options' => $companys]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
