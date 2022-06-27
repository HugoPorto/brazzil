<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresFinalcategory $storesFinalcategory
 */
?>
<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-striped" style="margin-top: 20px">
            <tr>
                <th scope="row"><?= __('Código') ?></th>
                <td><?= $this->Number->format($storesFinalcategory->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Título') ?></th>
                <td><?= h($storesFinalcategory->category) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Subcategoria') ?></th>
                <td><?= $storesFinalcategory->has('stores_subcategory') ? $this->Html->link($storesFinalcategory->stores_subcategory->subcategory, ['controller' => 'StoresSubcategories', 'action' => 'view', $storesFinalcategory->stores_subcategory->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Criado Em') ?></th>
                <td><?= h($storesFinalcategory->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Última Modificação') ?></th>
                <td><?= h($storesFinalcategory->modified) ?></td>
            </tr>
            </table>
        </div>
    </div>
</div>
