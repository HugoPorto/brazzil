<div class="card">
    <div class="card-body">
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Referência</th>
                    <th>Número</th>
                    <th>CEP</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th>Pedido</th>
                    <th>Usuário Que Pediu</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
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
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Referência</th>
                    <th>Número</th>
                    <th>CEP</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th>Pedido</th>
                    <th>Usuário Que Pediu</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
