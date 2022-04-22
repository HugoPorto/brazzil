<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Baixas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nova Baixa'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Produtos'), ['controller' => 'StoresProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Produto'), ['controller' => 'StoresProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lowsProducts view large-9 medium-8 columns content">
    <h3>Código da Baixa: <?= h($lowsProduct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Código') ?></th>
            <td><?= $this->Number->format($lowsProduct->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produto') ?></th>
            <td><?= $lowsProduct->has('stores_product') ? $this->Html->link($lowsProduct->stores_product->product, ['controller' => 'StoresProducts', 'action' => 'view', $lowsProduct->stores_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuário deu baixa') ?></th>
            <td><?= $lowsProduct->user->name?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($lowsProduct->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Em') ?></th>
            <td><?= h($lowsProduct->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Em') ?></th>
            <td><?= h($lowsProduct->modified) ?></td>
        </tr>
    </table>
</div>
