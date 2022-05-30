<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresSubcategory $storesSubcategory
 */
?>
<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-bordered" style="margin-top: 20px">
            <tr>
                <th scope="row"><?= __('Código') ?></th>
                <td><?= $this->Number->format($storesSubcategory->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Subcategoria') ?></th>
                <td><?= h($storesSubcategory->subcategory) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Categoria') ?></th>
                <td><?= $storesSubcategory->has('stores_category') ? $this->Html->link($storesSubcategory->stores_category->category, ['controller' => 'StoresCategories', 'action' => 'view', $storesSubcategory->stores_category->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Criado Em') ?></th>
                <td><?= h($storesSubcategory->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Última Atualização') ?></th>
                <td><?= h($storesSubcategory->modified) ?></td>
            </tr>
            </table>
        </div>
    </div>
</div>