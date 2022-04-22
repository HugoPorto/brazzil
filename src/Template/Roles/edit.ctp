<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $role->id],
                ['confirm' => __('Você tem certeza que quer apagar esse item?')]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Regras'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Editar Regra') ?></legend>
        <label>Regra*</label>
        <?php echo $this->Form->control('role', ['label' => false]); ?>
        <label>Regra Dois</label>
        <?php echo $this->Form->control('role_two', ['label' => false]); ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
