<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="form-group">
                <div class="btn-group">
                    <?= $this->Html->link(__('Ver Todos os Produtos'), ['action' => 'index'], ['class' => 'btn btn-info']) ?>
                </div>
                <div class="btn-group">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesProduct->id], ['class' => 'btn btn-info']) ?>
                </div>
                <div class="btn-group">
                    <?= $this->Html->link(__('Adicionar de Outra Cor'), ['action' => 'addNewProductColor', $storesProduct->id], ['class' => 'btn btn-info']) ?>
                </div>
                <div class="btn-group">
                    <?= $this->Html->link(__('Editar Fotos'), ['action' => 'editPhoto', $storesProduct->id], ['class' => 'btn btn-info']) ?>
                </div>
                <div class="btn-group">
                    <?= $this->Html->link(__('Editar Código de Barras'), ['action' => 'editBarcode', $storesProduct->id], ['class' => 'btn btn-info']) ?>
                </div>
                <div class="btn-group">
                    <?= $this->Html->link(__('Editar QrCode'), ['action' => 'editQrcode', $storesProduct->id], ['class' => 'btn btn-info']) ?>
                </div>
                <div class="btn-group">
                    <?= $this->Html->link(__('Editar Cor'), ['action' => 'editColor', $storesProduct->id], ['class' => 'btn btn-info']) ?>
                </div>
            </div>
            <div class="form-group">
                <div class="btn-group">
                    <?= $this->Html->link(__('Editar Quantidade'), ['action' => 'editQuantity', $storesProduct->id], ['class' => 'btn btn-info']) ?>
                </div>
                <div class="btn-group">
                    <?= $this->Html->link(__('Imprimir QrCode'), ['action' => 'printQrcode', $storesProduct->id], ['target' => '_blank', 'class' => 'btn btn-info']) ?>
                </div>
                <div class="btn-group">
                    <?= $this->Html->link(__('Imprimir QrCode como Imagem'), ['action' => 'printQrcodeImage', $storesProduct->id], ['target' => '_blank', 'class' => 'btn btn-info']) ?>
                </div>
                <div class="btn-group">
                    <?= $this->Html->link(__('Remover Produto'), ['action' => 'inactiveProduct', $storesProduct->id], ['class' => 'btn btn-danger']) ?>
                </div>
            </div>
        </div>
        <table class="vertical-table table table-striped" style="margin-top: 20px">
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
                <th scope="row"><?= __('Cor') ?></th>
                <td>
                    <?php if ($storesProduct->stores_color->color2 && $storesProduct->stores_color->color3) : ?>
                        <span class="dot" style="background-color: <?= $storesProduct->stores_color->color ?>;
                        background-image: linear-gradient(<?= $storesProduct->stores_color->color ?>, 
                        <?= $storesProduct->stores_color->color2 ?>, 
                        <?= $storesProduct->stores_color->color3 ?>);
                        "></span>
                    <?php elseif ($storesProduct->stores_color->color && $storesProduct->stores_color->color2) : ?>
                        <span class="dot" style="background-color: <?= $storesProduct->stores_color->color ?>;
                        background-image: linear-gradient(<?= $storesProduct->stores_color->color ?>, 
                        <?= $storesProduct->stores_color->color2 ?>);
                        "></span>
                    <?php else : ?>
                        <span class="dot" style="background-color: <?= $storesProduct->stores_color->color ?>"></span>
                    <?php endif; ?>
                </td>
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
                    <img style="width: 200px; height: 200px; border: 1px solid #d7d7d7" <?= $storesProduct->photo; ?> />

                    <?php foreach ($imagesExtrasProduct as $image) : ?>
                        <img style="width: 200px; height: 200px; border: 1px solid #d7d7d7" <?= $image->photo; ?> />
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
