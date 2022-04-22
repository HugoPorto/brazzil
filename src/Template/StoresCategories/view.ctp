<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Editar Categoria'), ['action' => 'edit', $storesCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Categoria'), ['action' => 'delete', $storesCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nova Categoria'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesCategories view large-9 medium-8 columns content">
    <h3>Código da categoria: <?= h($storesCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Código') ?></th>
            <td><?= $this->Number->format($storesCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= h($storesCategory->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($storesCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($storesCategory->modified) ?></td>
        </tr>
    </table>
</div>
