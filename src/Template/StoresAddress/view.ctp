<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-bordered" style="margin-top: 20px">
            <tr>
                <th scope="row"><?= __('Endereço') ?></th>
                <td><?= h($storesAddres->address) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Bairro') ?></th>
                <td><?= h($storesAddres->district) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Cidade') ?></th>
                <td><?= h($storesAddres->city) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Referência') ?></th>
                <td><?= h($storesAddres->reference) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Número') ?></th>
                <td><?= h($storesAddres->number) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('CEP') ?></th>
                <td><?= h($storesAddres->cep) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Pedido') ?></th>
                <td><?= $storesAddres->has('stores_demand') ? $this->Html->link($storesAddres->stores_demand->id, ['controller' => 'StoresDemands', 'action' => 'view', $storesAddres->stores_demand->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Usuário') ?></th>
                <td><?= $storesAddres->user->name ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Código') ?></th>
                <td><?= $this->Number->format($storesAddres->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Criado') ?></th>
                <td><?= h($storesAddres->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Última Modificação') ?></th>
                <td><?= h($storesAddres->modified) ?></td>
            </tr>
            </table>
        </div>
    </div>
</div>
