<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-bordered" style="margin-top: 20px">
                <tr>
                    <th scope="row"><?= __('Produto') ?></th>
                <td><?= $storesComment->has('stores_product') ? $this->Html->link($storesComment->stores_product->product, ['controller' => 'StoresProducts', 'action' => 'view', $storesComment->stores_product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Usuário') ?></th>
                    <td><?= $storesComment->has('user') ? $this->Html->link($storesComment->user->name, ['controller' => 'Users', 'action' => 'view', $storesComment->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Código') ?></th>
                    <td><?= $this->Number->format($storesComment->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Comentário') ?></th>
                    <td><?= $this->Text->autoParagraph(h($storesComment->comment)); ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado Em') ?></th>
                    <td><?= h($storesComment->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Última Modificação') ?></th>
                    <td><?= h($storesComment->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>