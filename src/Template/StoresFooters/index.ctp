<div class="card">
    <div class="card-body">
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>código</th>
                    <th>rodapé</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesFooters as $storesFooter) : ?>
                <tr>
                    <td><?= $this->Number->format($storesFooter->id) ?></td>
                    <td><?= h($storesFooter->footer) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesFooter->id], ['class' => 'btn btn-info']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesFooter->id], ['class' => 'btn btn-warning']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>código</th>
                    <th>rodapé</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
