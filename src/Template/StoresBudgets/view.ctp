<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-striped" style="margin-top: 20px">
                <tr>
                    <th scope="row"><?= __('Nome') ?></th>
                <td><?= h($storesBudget->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('E-mail') ?></th>
                    <td><?= h($storesBudget->email) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Código') ?></th>
                    <td><?= $this->Number->format($storesBudget->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Orçamento') ?></th>
                    <td><?= $this->Number->format($storesBudget->budget) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado Em') ?></th>
                    <td><?= h($storesBudget->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Última Modificação') ?></th>
                    <td><?= h($storesBudget->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>