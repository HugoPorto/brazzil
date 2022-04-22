<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Categorias'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesCategories form large-10 medium-8 columns content">
    <?= $this->Form->create($storesCategory) ?>
    <fieldset>
        <legend><?= __('Adicionar Categoria') ?></legend>
        <label for="category">Categoria</label>
        <?php
            echo $this->Form->control('category', [
                'label' => false
            ]);
        ?>

        <input
            type="hidden"
            class="form-control"
            name="users_id"
            value="<?= $idUser ?>"/>

    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>
