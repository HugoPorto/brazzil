<div class="card">
    <div class="card-body">
        <div class="margin">
        <p><?= $this->Flash->render() ?></p>

            <?php if (empty($storesSuperpass->toArray())) : ?>
                <div class="btn-group">
                    <?= $this->Html->link(__('Adicionar Superpass'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
                </div>
            <?php endif; ?>

        </div>
        <br>
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Superpass</th>
                    <th>Criado Em</th>
                    <th>Última Atualização</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesSuperpass as $storesSuperpas) : ?>
                <tr>
                    <td><?= h($storesSuperpas->superpass) ?></td>
                    <td><?= h($storesSuperpas->created) ?></td>
                    <td><?= h($storesSuperpas->modified) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Superpass</th>
                    <th>Criado Em</th>
                    <th>Última Atualização</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

