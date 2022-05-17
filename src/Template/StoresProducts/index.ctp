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
                    <th>Código</th>
                    <th>Número Código de Barras</th>
                    <th>Código de Barras</th>
                    <th>Cor</th>
                    <th>Produto</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                    <th>Ativo</th>
                    <th>Online</th>
                    <th>Criado Em</th>
                    <th>Modificado Em</th>
                    <th>QrCode</th>
                    <th>Foto</th>
                    <th>Peso</th>
                    <th>Formato</th>
                    <th>Comprimento</th>
                    <th>Altura</th>
                    <th>Largura</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
            <?php foreach ($storesProducts as $storesProduct) : ?>
                <?php if ($storesProduct->active) : ?>
                    <tr>
                        <td><?= $storesProduct->id ?></td>
                        <td><?= $storesProduct->has('barcode_code') ? $storesProduct->barcode_code : '' ?></td>
                        <td><?= $storesProduct->has('barcode') ? $storesProduct->barcode : '' ?></td>
                        <td>
                            <span class="dot" style="background-color: <?= $storesProduct->stores_color->color ?>"></span>
                        </td>

                        <td><?= h($storesProduct->product) ?></td>
                        <td><?= h($storesProduct->description) ?></td>
                        <td>R$<?= h($storesProduct->price) ?></td>
                        <td><?= $storesProduct->has('stores_category') ? $this->Html->link($storesProduct->stores_category->category, ['controller' => 'StoresCategories', 'action' => 'view', $storesProduct->stores_category->id]) : '' ?></td>
                        <td><?= $this->Number->format($storesProduct->quantity) ?></td>
                        <td>
                            <?php if ($storesProduct->active) :?>
                                sim

                            <?php else :?>
                                    não

                            <?php endif;?>
                                </td>
                                <td>
                                    <?php if ($storesProduct->online) :?>
                                        sim

                                    <?php else :?>
                                            não

                                    <?php endif;?>
                                        </td>
                        <td><?= $this->Tools->formatDate($storesProduct->created) ?></td>
                        <td><?= $this->Tools->formatDate($storesProduct->modified) ?></td>
                        <td><?= $storesProduct->has('qrcode') ? $storesProduct->qrcode : '' ?></td>
                        <td>
                            <img style="width: 255px; height: 255px; border: 1px solid #d7d7d7" <?= $storesProduct->photo ?>/>
                        </td>
                        <td><?= $storesProduct->weight ?></td>
                        <td><?= $storesProduct->package_format ?></td>
                        <td><?= $storesProduct->package_lengths ?></td>
                        <td><?= $storesProduct->package_height ?></td>
                        <td><?= $storesProduct->package_width ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesProduct->id], ['class' => 'btn btn-info']) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesProduct->id], ['class' => 'btn btn-info']) ?>
                            <?= $this->Html->link(__('Editar Foto'), ['action' => 'editPhoto', $storesProduct->id], ['class' => 'btn btn-info']) ?>
                            <?= $this->Html->link(__('Editar Código de Barras'), ['action' => 'editBarcode', $storesProduct->id], ['class' => 'btn btn-info']) ?>
                            <?= $this->Html->link(__('Editar QrCode'), ['action' => 'editQrcode', $storesProduct->id], ['class' => 'btn btn-info']) ?>
                            <?= $this->Html->link(__('Remover Produto'), ['action' => 'inactiveProduct', $storesProduct->id], ['class' => 'btn btn-danger']) ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Número Código de Barras</th>
                    <th>Código de Barras</th>
                    <th>Cor</th>
                    <th>Produto</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                    <th>Ativo</th>
                    <th>Online</th>
                    <th>Criado Em</th>
                    <th>Modificado Em</th>
                    <th>QrCode</th>
                    <th>Foto</th>
                    <th>Peso</th>
                    <th>Formato</th>
                    <th>Comprimento</th>
                    <th>Altura</th>
                    <th>Largura</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
