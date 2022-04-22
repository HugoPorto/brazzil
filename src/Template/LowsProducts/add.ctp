<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Baixas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Produtos'), ['controller' => 'StoresProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Produto'), ['controller' => 'StoresProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lowsProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($lowsProduct) ?>
    <fieldset>
        <legend><?= __('Nova Baixa') ?></legend>

        <label>Produto*</label>
        <?php
            echo $this->Form->control(
                'stores_products_id',
                [
                'options' => $storesProducts,
                'label' => false
                ]
            );
            ?>

        <label for="quantity">Quantidade*</label>
        <?php
            echo $this->Form->control(
                'quantity',
                [
                'label' => false
                ]
            );
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
