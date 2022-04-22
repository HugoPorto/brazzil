<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Pedidos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesDemands form large-9 medium-8 columns content">
    <?= $this->Form->create($storesDemand) ?>
    <fieldset>
        <legend><?= __('Editar Pedido') ?></legend>
        <?php
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>

    <?= $this->Form->end() ?>
</div>
