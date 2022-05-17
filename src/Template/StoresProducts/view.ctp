<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-bordered" style="margin-top: 20px">
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
                <th scope="row"><?= __('Fotos Do Produto') ?></th>
                <td>
                    <img style="width: 255px; height: 255px" <?= $storesProduct->photo; ?> />

                    <?php foreach ($imagesExtrasProduct as $image) : ?>
                        <img style="width: 255px; height: 255px" <?= $image->photo; ?> />
                    <?php endforeach; ?>
                
                </td>
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
                <th scope="row"><?= __('Ativo') ?></th>
                <td><?= $storesProduct->active ? __('Sim') : __('Não'); ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Online') ?></th>
                <td><?= $storesProduct->online ? __('Sim') : __('Não'); ?></td>
            </tr>
            </table>
        </div>
    </div>
</div>
