<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Pedidos'), ['controller' => 'StoresDemands', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesAddress index large-9 medium-8 columns content">
    <h3><?= __('Dados Para Entregas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Código') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Endereço') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Bairro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Referência') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Número') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CEP') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Criado Em') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Última Modificação') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Pedido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Usuário Que Pediu') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesAddress as $storesAddres) : ?>
            <tr>
                <td><?= $this->Number->format($storesAddres->id) ?></td>
                <td><?= h($storesAddres->address) ?></td>
                <td><?= h($storesAddres->district) ?></td>
                <td><?= h($storesAddres->city) ?></td>
                <td><?= h($storesAddres->reference) ?></td>
                <td><?= h($storesAddres->number) ?></td>
                <td><?= h($storesAddres->cep) ?></td>
                <td><?= h($storesAddres->created) ?></td>
                <td><?= h($storesAddres->modified) ?></td>
                <td><?= $storesAddres->has('stores_demand') ? $this->Html->link($storesAddres->stores_demand->id, ['controller' => 'StoresDemands', 'action' => 'view', $storesAddres->stores_demand->id]) : '' ?></td>
                <td><?= $storesAddres->user->name ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesAddres->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')]) ?></p>
    </div>
</div>
