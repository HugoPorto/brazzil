<div class="card">
    <div class="card-body">
        <div class="margin">
        <p><?= $this->Flash->render() ?></p>
            <div class="btn-group">
                <?= $this->Html->link(__('Adicionar Nova Categoria'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <br>
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Categoria</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesCategories as $storesCategory) : ?>
                <tr>
                    <td><?= $this->Number->format($storesCategory->id) ?></td>
                    <td><?= h($storesCategory->category) ?></td>
                    <td><?= h($storesCategory->created) ?></td>
                    <td><?= h($storesCategory->modified) ?></td>
                    <td class="actions">
                        <div class="margin">
                            <div class="btn-group">
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesCategory->id], ['class' => 'btn btn-warning']) ?>
                            </div>
                            <div class="btn-group">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesCategory->id], ['class' => 'btn btn-info']) ?>
                            </div>
                            <div class="btn-group">
                                <?= $this->Html->link(__('Vizualizar Produtos Relacionados'), ['controller' => 'StoresProducts', 'action' => 'relationshipProducts', $storesCategory->id], ['class' => 'btn btn-success']) ?>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-danger" onclick="toastrDeleteCategory(<?= $storesCategory->id; ?>)">
                                    Deletar
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Categoria</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

