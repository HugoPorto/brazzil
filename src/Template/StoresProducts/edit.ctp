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

        <label for="product">Produto*</label>
        <?php

            echo $this->Form->control('product', [
                'label' => false
            ]);
        ?>

        <label for="description">Descrição*</label>
        <?php
            echo $this->Form->control('description', [
                'label' => false
            ]);
        ?>

        <label for="description">Preço*</label>
        <?php
            echo $this->Form->control('price', [
                'label' => false
            ]);
        ?>

        <?php
            echo $this->Form->control('stores_categories_id', ['options' => $storesCategories]);
        ?>

        <label for="description">Online*</label>
        <?php
            echo $this->Form->control('online',
            [
                'label' => false
            ]);
        ?>

        <label>Peso*</label>
        <?php echo $this->Form->control('weight', ['label' => false]); ?>

        <label> Formato*</label>
        <?php echo $this->Form->control('package_format', ['label' => false]); ?>

        <label> Comprimento*</label>
        <?php echo $this->Form->control('package_lengths', ['label' => false]); ?>

        <label> Altura*</label>
        <?php echo $this->Form->control('package_height', ['label' => false]); ?>

        <label> Largura*</label>
        <?php echo $this->Form->control('package_width', ['label' => false]); ?>

    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
