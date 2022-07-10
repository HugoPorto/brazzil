<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<div class="card">
    <div class="card-body">
    <div class="margin">
            <div class="form-group">
                <div class="btn-group">
                    <?= $this->Html->link(
                        __('Editar Empresa'),
                        ['action' => 'edit', $company->id],
                        ['class' => 'btn btn-warning']
                    ) ?>
                </div>
                <div class="btn-group">
                    <?= $this->Html->link(
                        __('Editar Logotipo'),
                        ['action' => 'editPhoto', $company->id],
                        ['class' => 'btn btn-warning']
                    ) ?>
                </div>
            </div>
        </div>
        <div class="margin">
            <table class="vertical-table table table-striped table_view">
                <tr>
                    <th scope="row"><?= __('Código') ?></th>
                    <td><?= $this->Number->format($company->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Empresa') ?></th>
                    <td><?= h($company->company) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Usuário') ?></th>
                    <td><?= $company->user->name ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Email') ?></th>
                    <td><?= h($company->email) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Telefone') ?></th>
                    <td><?= h($company->phone) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Número Fiscal') ?></th>
                    <td><?= h($company->fiscal_number) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Endereço') ?></th>
                    <td><?= h($company->address) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Cidade') ?></th>
                    <td><?= $company->has('city') ? $this->Html->link($company->city->name, ['controller' => 'Citys', 'action' => 'view', $company->city->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('CEP') ?></th>
                    <td><?= h($company->cep) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Estado') ?></th>
                    <td><?= $company->has('state') ? $this->Html->link($company->state->name, ['controller' => 'States', 'action' => 'view', $company->state->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Fotos Do Produto') ?></th>
                    <td>
                        <img style="width: 200px; border: 1px solid #d7d7d7" <?= $company->photo; ?> />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado Em') ?></th>
                    <td><?= h($company->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Última Modificação') ?></th>
                    <td><?= h($company->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>