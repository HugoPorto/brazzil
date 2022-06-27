<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresTerm[]|\Cake\Collection\CollectionInterface $storesTerms
 */
?>
<div class="card">
    <div class="card-body">
        <?php if (empty($storesTerms->toArray())) :?>
        <div class="margin">
            <div class="btn-group">
                <?= $this->Html->link(__('Adicionar Termos'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <br>
        <?php endif;?>
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Termos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesTerms as $storesTerm) : ?>
                <tr>
                    <td><?= h($storesTerm->terms) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesTerm->id], ['class' => 'btn btn-info']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesTerm->id], ['class' => 'btn btn-warning']) ?>
                        <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $storesTerm->id], ['confirm' => __('Tem certeza que deseja apagar esse item?'), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Termos</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

