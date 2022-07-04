<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresTerm $storesTerm
 */
?>
<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="btn-group">
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesTerm->id], ['class' => 'btn btn-warning']) ?>
            </div>
            <div class="btn-group">
                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $storesTerm->id], ['confirm' => __('Tem certeza que deseja apagar esse item?'), 'class' => 'btn btn-danger']) ?>
            </div>
            <div class="btn-group">
                <?= $this->Html->link(__('Todos os Termos'), ['action' => 'index'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <div class="margin">
            <table class="vertical-table table table-striped table_view">
            <tr>
                <th scope="row"><?= __('Código') ?></th>
                <td><?= $this->Number->format($storesTerm->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Usúario que Criou') ?></th>
                <td><?= $storesTerm->has('user') ? $storesTerm->user->name : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Criado Em') ?></th>
                <td><?= h($storesTerm->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Última Modificação') ?></th>
                <td><?= h($storesTerm->modified) ?></td>
            </tr>
            </table>
            <div class="row">
                <h4><?= __('Termos') ?></h4>
                <?= $this->Text->autoParagraph(h($storesTerm->terms)); ?>
            </div>
        </div>
    </div>
</div>
