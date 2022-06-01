<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresFinalcategory[]|\Cake\Collection\CollectionInterface $storesFinalcategories
 */
?>
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
                    <th>Categoria</th>
                    <th>Subcategoria</th>
                    <th>Criado Em</th>
                    <th>Última Atualização</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($storesFinalcategories as $storesFinalcategory) : ?>
                <tr>
                    <td><?= $this->Number->format($storesFinalcategory->id) ?></td>
                    <td><?= h($storesFinalcategory->category) ?></td>
                    <td><?= $storesFinalcategory->has('stores_subcategory') ? $this->Html->link($storesFinalcategory->stores_subcategory->subcategory, ['controller' => 'StoresSubcategories', 'action' => 'view', $storesFinalcategory->stores_subcategory->id]) : '' ?></td>
                    <td><?= h($storesFinalcategory->created) ?></td>
                    <td><?= h($storesFinalcategory->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesFinalcategory->id], ['class' => 'btn btn-info']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesFinalcategory->id], ['class' => 'btn btn-warning']) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $storesFinalcategory->id], ['confirm' => __('Tem certeza que deseja apagar esse item?', $storesFinalcategory->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Categoria</th>
                    <th>Subcategoria</th>
                    <th>Criado Em</th>
                    <th>Última Atualização</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
