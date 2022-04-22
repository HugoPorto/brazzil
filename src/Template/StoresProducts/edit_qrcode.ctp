<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $storesProduct->id],
                ['confirm' => __('Você quer apagar esse item?', $storesProduct->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Produtos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Categorias'), ['controller' => 'StoresCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nova Categoria'), ['controller' => 'StoresCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesProducts form large-10 medium-8 columns content">
<?= $this->Form->create($storesProduct) ?>
    <fieldset>
        <legend><?= __('Editar Produto') ?></legend>

        <label for="product">QrCode</label>
        <?php

            echo $this->Form->control('qrcode', [
                'label' => false,
                'type' => 'text'
            ]);
        ?>

    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
