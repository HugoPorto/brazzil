
<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="btn-group">
                <?= $this->Html->link(__('Editar Categoria'), ['action' => 'edit', $storesCategory->id], ['class' => 'btn btn-warning']) ?>
            </div>
            <div class="btn-group">
                <button class="btn btn-danger" onclick="toastrDeleteCategory(<?= $storesCategory->id; ?>)">
                    Deletar
                </button>
            </div>
            <div class="btn-group">
                <?= $this->Html->link(__('Categorias'), ['action' => 'index'], ['class' => 'btn btn-info']) ?>
            </div>
            <div class="btn-group">
                <?= $this->Html->link(__('Nova Categoria'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="margin">
            <table class="vertical-table table table-striped" style="margin-top: 20px">
                <tr>
                    <th scope="row"><?= __('Código') ?></th>
                    <td><?= $this->Number->format($storesCategory->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Categoria') ?></th>
                    <td><?= h($storesCategory->category) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado Em') ?></th>
                    <td><?= h($storesCategory->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Última Modificação') ?></th>
                    <td><?= h($storesCategory->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
