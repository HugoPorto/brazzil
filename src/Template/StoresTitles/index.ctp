<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresTitle[]|\Cake\Collection\CollectionInterface $storesTitles
 */
?>
<div class="card">
    <div class="card-body">
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesTitles as $storesTitle) : ?>
                <tr>
                    <td><?= $this->Number->format($storesTitle->id) ?></td>
                    <td><?= h($storesTitle->title) ?></td>
                    <td><?= h($storesTitle->created) ?></td>
                    <td><?= h($storesTitle->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesTitle->id], ['class' => 'btn btn-warning']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
