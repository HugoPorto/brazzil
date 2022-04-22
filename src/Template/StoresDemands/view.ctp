<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Editar Pedido'), ['action' => 'edit', $storesDemand->id]) ?> </li>
        <li><?= $this->Html->link(__('Listar Pedidos'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="storesDemands view large-9 medium-8 columns content">
    <h3>Código: <?= h($storesDemand->id) ?></h3>
    <table class="vertical-table">
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
            <td><?= $storesDemand->status ? __('Processado..') : __('Processando..'); ?></td>
        </tr>
    </table>
</div>
