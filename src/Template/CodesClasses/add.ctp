<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CodesClass $codesClass
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Codes Classes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companys'), ['controller' => 'Companys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores Menus'), ['controller' => 'StoresMenus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Menu'), ['controller' => 'StoresMenus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="codesClasses form large-9 medium-8 columns content">
    <?= $this->Form->create($codesClass) ?>
    <fieldset>
        <legend><?= __('Add Codes Class') ?></legend>
        <?php
            echo $this->Form->control('code');
            echo $this->Form->control('stores_courses_id', ['options' => $storesCourses]);
            echo $this->Form->control('companys_id', ['options' => $companys]);
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('stores_menus_id', ['options' => $storesMenus]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
