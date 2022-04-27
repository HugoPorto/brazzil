<div class="card">
    <div class="card-body">
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>código</th>
                    <th>pedido</th>
                    <th>produto</th>
                    <th>quantidade</th>
                    <th>criado</th>
                    <th>modificado</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesItemsDemands as $storesItemsDemand) : ?>
                <tr>
                    <td><?= $this->Number->format($storesItemsDemand->id) ?></td>
                    <td><?= $storesItemsDemand->has('stores_demand') ? $this->Html->link($storesItemsDemand->stores_demand->id, ['controller' => 'StoresDemands', 'action' => 'view', $storesItemsDemand->stores_demand->id]) : '' ?></td>
                    <td><?= $storesItemsDemand->has('stores_product') ? $this->Html->link($storesItemsDemand->stores_product->id, ['controller' => 'StoresProducts', 'action' => 'view', $storesItemsDemand->stores_product->id]) : '' ?></td>
                    <td><?= h($storesItemsDemand->quantity) ?></td>
                    <td><?= h($storesItemsDemand->created) ?></td>
                    <td><?= h($storesItemsDemand->modified) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>código</th>
                    <th>pedido</th>
                    <th>produto</th>
                    <th>quantidade</th>
                    <th>criado</th>
                    <th>modificado</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
