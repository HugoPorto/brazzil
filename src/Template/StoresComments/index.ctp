<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresComment[]|\Cake\Collection\CollectionInterface $storesComments
 */
?>
<div class="card">
    <div class="card-body">
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Produto</th>
                    <th>Anônimo</th>
                    <th>Usuário</th>
                    <th>Criado Em</th>
                    <th>Última Atualização</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesComments as $storesComment) : ?>
                <tr>
                    <td><?= $this->Number->format($storesComment->id) ?></td>
                    <td><?= $storesComment->has('stores_product') ? $this->Html->link($storesComment->stores_product->product, ['controller' => 'StoresProducts', 'action' => 'view', $storesComment->stores_product->id]) : '' ?></td>
                    <td><?= h($storesComment->name_user) ?></td>
                    <td><?= $storesComment->has('user') ? $this->Html->link($storesComment->user->name, ['controller' => 'Users', 'action' => 'view', $storesComment->user->id]) : '' ?></td>
                    <td><?= h($storesComment->created) ?></td>
                    <td><?= h($storesComment->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesComment->id], ['class' => 'btn btn-info']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Produto</th>
                    <th>Anônimo</th>
                    <th>Usuário</th>
                    <th>Criado Em</th>
                    <th>Última Atualização</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
