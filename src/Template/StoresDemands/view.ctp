<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-striped" style="margin-top: 20px">
                <tr>
                    <th scope="row"><?= __('Usuário') ?></th>
                    <td><?= $storesDemand->user->name ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Código') ?></th>
                    <td><?= $this->Number->format($storesDemand->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado Em') ?></th>
                    <td><?= h($storesDemand->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Última Modificação') ?></th>
                    <td><?= h($storesDemand->modified) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Status') ?></th>
                    <td>
                        <?php if ($storesDemand->status) :?>
                            <span class="badge badge-success">Processado</span>
                        <?php else :?>
                            <span class="badge badge-danger">Processando..</span>
                        <?php endif;?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>





