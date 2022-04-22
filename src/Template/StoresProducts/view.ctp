<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Editar Produto'), ['action' => 'edit', $storesProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produto'), ['action' => 'delete', $storesProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('Produtos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Produto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Categorias'), ['controller' => 'StoresCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nova Categoria'), ['controller' => 'StoresCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesProducts view large-10 medium-8 columns content">
    <h3>Código do produto: <?= h($storesProduct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Código de Barras') ?></th>
            <td><?= $storesProduct->barcode ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('QrCode') ?></th>
            <td><?= $storesProduct->qrcode ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produto') ?></th>
            <td><?= h($storesProduct->product) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descrição') ?></th>
            <td><?= h($storesProduct->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Preço') ?></th>
            <td><?= h($storesProduct->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $storesProduct->has('stores_category') ? $this->Html->link($storesProduct->stores_category->category, ['controller' => 'StoresCategories', 'action' => 'view', $storesProduct->stores_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Foto') ?></th>
            <td><img style="width: 255px; height: 255px" <?= $storesProduct->photo; ?> /></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Códgio do Produto') ?></th>
            <td><?= $this->Number->format($storesProduct->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($storesProduct->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($storesProduct->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($storesProduct->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activo') ?></th>
            <td><?= $storesProduct->active ? __('Sim') : __('Não'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Online') ?></th>
            <td><?= $storesProduct->online ? __('Sim') : __('Não'); ?></td>
        </tr>
    </table>
</div>
