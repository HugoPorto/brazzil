<div class="card">
    <div class="card-body">
        <table class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Contato</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesContacts as $storesContact) : ?>
                <tr>
                    <td><?= $this->Number->format($storesContact->id) ?></td>
                    <td><?= h($storesContact->contact) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            __('Editar'),
                            ['action' => 'edit', $storesContact->id],
                            ['class' => 'btn btn-warning']
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Contato</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


