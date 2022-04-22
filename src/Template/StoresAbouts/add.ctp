<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores Abouts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesAbouts form large-9 medium-8 columns content">
    <?= $this->Form->create($storesAbout) ?>
    <fieldset>
        <legend><?= __('Add Stores About') ?></legend>
        <?php
            echo $this->Form->control('about');
        ?>

        <input
            type="hidden"
            class="form-control"
            name="users_id"
            value="<?= $idUser ?>"/>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
