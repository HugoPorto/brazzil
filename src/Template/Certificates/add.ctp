<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Certificate $certificate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Certificates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores Courses'), ['controller' => 'StoresCourses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stores Course'), ['controller' => 'StoresCourses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="certificates form large-9 medium-8 columns content">
    <?= $this->Form->create($certificate) ?>
    <fieldset>
        <legend><?= __('Add Certificate') ?></legend>
        <?php
            echo $this->Form->control('stores_courses_id', ['options' => $storesCourses]);
            echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
