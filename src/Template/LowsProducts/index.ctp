<div class="card">
    <div class="card-body">
    <div class="margin">
            <div class="btn-group">
                <?= $this->Html->link(__('Adicionar'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <br>
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>código</th>
                    <th>produto</th>
                    <th>quantidade</th>
                    <th>usuário que realizou a baixa</th>
                    <th>criado em</th>
                    <th>modificado em</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lowsProducts as $lowsProduct) : ?>
                <tr>
                    <td><?= $this->Number->format($lowsProduct->id) ?></td>
                    <td><?= $lowsProduct->has('stores_product') ? $this->Html->link($lowsProduct->stores_product->product, ['controller' => 'StoresProducts', 'action' => 'view', $lowsProduct->stores_product->id]) : '' ?></td>
                    <td><?= $this->Number->format($lowsProduct->quantity) ?></td>
                    <td><?= $lowsProduct->user->name ?></td>
                    <td><?= h($lowsProduct->created) ?></td>
                    <td><?= h($lowsProduct->modified) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>código</th>
                    <th>produto</th>
                    <th>quantidade</th>
                    <th>usuário que realizou a baixa</th>
                    <th>criado em</th>
                    <th>modificado em</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
