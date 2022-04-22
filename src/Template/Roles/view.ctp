<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Editar Regra'), ['action' => 'edit', $role->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Regra'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Regras'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nova Regra'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roles view large-9 medium-8 columns content">
    <h3>Regra: <?= h($role->role) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Código Da Regra') ?></th>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Regra') ?></th>
            <td><?= h($role->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Regra Dois') ?></th>
            <td><?= h($role->role_two) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Em') ?></th>
            <td><?= h($role->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Em') ?></th>
            <td><?= h($role->modified) ?></td>
        </tr>
    </table>
</div>
