<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresSubcategory[]|\Cake\Collection\CollectionInterface $storesSubcategories
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
                    <th>Subcategoria</th>
                    <th>Categoria</th>
                    <th>Criada Em</th>
                    <th>Última Atualização</th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($storesSubcategories as $storesSubcategory) : ?>
                <tr>
                    <td><?= $this->Number->format($storesSubcategory->id) ?></td>
                    <td><?= h($storesSubcategory->subcategory) ?></td>
                    <td><?= $storesSubcategory->has('stores_category') ? $this->Html->link($storesSubcategory->stores_category->category, ['controller' => 'StoresCategories', 'action' => 'view', $storesSubcategory->stores_category->id]) : '' ?></td>
                    <td><?= h($storesSubcategory->created) ?></td>
                    <td><?= h($storesSubcategory->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            __('Ver'),
                            ['action' => 'view', $storesSubcategory->id],
                            [
                                'class' => 'btn btn-info'
                            ]
                        ) ?>
                        <?= $this->Html->link(
                            __('Editar'),
                            [
                            'action' => 'edit',
                            $storesSubcategory->id],
                            ['class' => 'btn btn-warning']
                        ) ?>
                        <?= $this->Form->postLink(
                            __('Apagar'),
                            ['action' => 'delete', $storesSubcategory->id],
                            ['confirm' => __('Tem certeza que deseja apagar esse item?', $storesSubcategory->id), 'class' => 'btn btn-danger']
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Subcategoria</th>
                    <th>Categoria</th>
                    <th>Criada Em</th>
                    <th>Última Atualização</th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
