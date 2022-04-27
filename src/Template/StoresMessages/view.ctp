<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-bordered" style="margin-top: 20px">
            <tr>
                <th scope="row"><?= __('Código') ?></th>
                <td><?= $this->Number->format($storesMessage->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nome') ?></th>
                <td><?= h($storesMessage->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Email') ?></th>
                <td><?= h($storesMessage->email) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Criado Em') ?></th>
                <td><?= h($storesMessage->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modificado Em') ?></th>
                <td><?= h($storesMessage->modified) ?></td>
            </tr>
            </table>
        </div>
    </div>
</div>
