<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tablesroots'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tablesroots form large-10 medium-8 columns content">
    <?= $this->Form->create($tablesroot) ?>
    <fieldset>
        <legend><?= __('Add Tablesroot') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('text');
            echo $this->Form->control('link');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
