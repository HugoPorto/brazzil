<div class="card">
    <div class="card-body">
        <table class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Sobre</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesAbouts as $storesAbout) : ?>
                <tr>
                    <td><?= $this->Number->format($storesAbout->id) ?></td>
                    <td><?= $storesAbout->about ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            __('Editar'),
                            ['action' => 'edit', $storesAbout->id],
                            ['class' => 'btn btn-warning']
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Sobre</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
