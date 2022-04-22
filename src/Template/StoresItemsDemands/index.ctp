<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Pedidos'), ['controller' => 'StoresDemands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Produtos'), ['controller' => 'StoresProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Produto'), ['controller' => 'StoresProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesItemsDemands index large-9 medium-8 columns content">
    <h3><?= __('Itens e Pedidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('código') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pedido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('produto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesItemsDemands as $storesItemsDemand) : ?>
            <tr>
                <td><?= $this->Number->format($storesItemsDemand->id) ?></td>
                <td><?= $storesItemsDemand->has('stores_demand') ? $this->Html->link($storesItemsDemand->stores_demand->id, ['controller' => 'StoresDemands', 'action' => 'view', $storesItemsDemand->stores_demand->id]) : '' ?></td>
                <td><?= $storesItemsDemand->has('stores_product') ? $this->Html->link($storesItemsDemand->stores_product->id, ['controller' => 'StoresProducts', 'action' => 'view', $storesItemsDemand->stores_product->id]) : '' ?></td>
                <td><?= h($storesItemsDemand->quantity) ?></td>
                <td><?= h($storesItemsDemand->created) ?></td>
                <td><?= h($storesItemsDemand->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesItemsDemand->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesItemsDemand->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
