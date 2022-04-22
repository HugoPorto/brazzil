<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $storesCategory->id],
                ['confirm' => __('Você tem certeza que deseja apagar esse item?', $storesCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Categorias'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesCategories form large-10 medium-8 columns content">
    <?= $this->Form->create($storesCategory) ?>
    <fieldset>
        <legend><?= __('Editar Categoria') ?></legend>

        <label for="category">Categoria</label>
        <?php
            echo $this->Form->control('category', [
                'label' => false
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
