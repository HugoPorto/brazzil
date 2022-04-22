<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Superpass'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesSuperpass form large-9 medium-8 columns content">
    <?= $this->Form->create($storesSuperpas) ?>
    <fieldset>
        <legend><?= __('Adicionar Superpass') ?></legend>
        <?php
            echo $this->Form->control('superpass');
            echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser, 'class' => 'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>
