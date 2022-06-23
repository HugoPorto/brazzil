<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresBudget[]|\Cake\Collection\CollectionInterface $storesBudgets
 */
?>
<div class="card">
    <div class="card-body">
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Criado Em</th>
                    <th>Última Atualização</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesBudgets as $storesBudget) : ?>
                <tr>
                    <td><?= $this->Number->format($storesBudget->id) ?></td>
                    <td><?= h($storesBudget->name) ?></td>
                    <td><?= h($storesBudget->email) ?></td>
                    <td><?= h($storesBudget->created) ?></td>
                    <td><?= h($storesBudget->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesBudget->id], ['class' => 'btn btn-info']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Criado Em</th>
                    <th>Última Atualização</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
