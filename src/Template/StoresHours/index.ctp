<div class="card">
    <div class="card-body">
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>código</th>
                    <th>Horários</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesHours as $storesHour) : ?>
                <tr>
                    <td><?= $this->Number->format($storesHour->id) ?></td>
                    <td><?= h($storesHour->hour) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            __('Editar'),
                            ['action' => 'edit', $storesHour->id],
                            ['class' => 'btn btn-warning']
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>código</th>
                    <th>Horários</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

