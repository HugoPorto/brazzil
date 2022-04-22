<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Produtos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Categorias'), ['controller' => 'StoresCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nova Categoria'), ['controller' => 'StoresCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesProducts form large-10 medium-8 columns content">
<?= $this->Form->create($storesProduct, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Editar Produto') ?></legend>

        <label for="description">Foto*</label>

        <?php
            echo $this->Form->control('photo[]', ['label' => false, 'type' => 'file', 'multiple' => false]);
        ?>

    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
