<div class="card">
    <div class="card-body">
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>código</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Criado Em</th>
                    <th>Modificado Em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesMessages as $storesMessage) : ?>
                <tr>
                    <td><?= $this->Number->format($storesMessage->id) ?></td>
                    <td><?= h($storesMessage->name) ?></td>
                    <td><?= h($storesMessage->email) ?></td>
                    <td><?= h($storesMessage->created) ?></td>
                    <td><?= h($storesMessage->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesMessage->id], ['class' => 'btn btn-info']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>código</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Criado Em</th>
                    <th>Modificado Em</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
