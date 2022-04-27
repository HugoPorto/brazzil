<div class="card">
    <div class="card-body">
        <table class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Logo</th>
                    <th>Criada Em</th>
                    <th>Última Modificação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesLogos as $storesLogo) : ?>
                <tr>
                    <td><?= $this->Number->format($storesLogo->id) ?></td>
                    <td>
                        <?php echo $this->Html->image('galerys/13/' . $storesLogo->logo, ['class' => 'img-fluid']); ?>
                    </td>
                    <td><?= h($storesLogo->created) ?></td>
                    <td><?= h($storesLogo->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            __('Editar'),
                            ['action' => 'edit', $storesLogo->id],
                            ['class' => 'btn btn-info']
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Logo</th>
                    <th>Criada Em</th>
                    <th>Última Modificação</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
