<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Horários'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesHours form large-9 medium-8 columns content">
    <?= $this->Form->create($storesHour) ?>
    <fieldset>
        <legend><?= __('Edit Stores Hour') ?></legend>
        <label>  Horários</label>
        <?php
            echo $this->Form->control('hour', ['label' => false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
