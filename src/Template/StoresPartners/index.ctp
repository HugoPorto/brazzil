<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresPartner[]|\Cake\Collection\CollectionInterface $storesPartners
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
        <table class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Logo</th>
                    <th>Parceiro</th>
                    <th>Criado Em</th>
                    <th>Última Atualização</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesPartners as $storesPartner) : ?>
                        <tr>
                            <td><?= $this->Number->format($storesPartner->id) ?></td>
                            <td>
                                <img style="width: 200px; border: 1px solid #d7d7d7; padding: 10px" <?= $storesPartner->photo ?>/>
                            </td>
                            <td><?= h($storesPartner->partner) ?></td>
                            <td><?= h($storesPartner->created) ?></td>
                            <td><?= h($storesPartner->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesPartner->id], ['class' => 'btn btn-warning']) ?>
                                <?= $this->Form->postLink(
                                    __('Apagar'),
                                    ['action' => 'delete', $storesPartner->id],
                                    ['confirm' => __('Você tem certeza que quer apagar esse item?', $storesPartner->id),
                                    'class' => 'btn btn-danger']
                                ) ?>
                            </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Logo</th>
                    <th>Parceiro</th>
                    <th>Criado Em</th>
                    <th>Última Atualização</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

