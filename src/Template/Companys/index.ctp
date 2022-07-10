<div class="card">
    <div class="card-body">
        <div class="margin">
        <p><?= $this->Flash->render() ?></p>
            <div class="btn-group">
                <?= $this->Html->link(__('Adicionar Nova Empresa'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <br>
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Produção</th>
                    <th>Empresa</th>
                    <th>Logotipo</th>
                    <th>Usuário</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Número Fiscal</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>CEP</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($companys as $company) : ?>
                <tr>
                    <td><?= $this->Number->format($company->id) ?></td>
                    <td>
                        <?php if ($company->active) :?>
                            Ativa
                        <?php elseif (!$company->active) :?>
                            <?= $this->Html->link(
                                __('Colocar em Produção'),
                                ['action' => 'putProduction', $company->id]
                            ) ?>
                        <?php endif;?>    
                    </td>
                    <td><?= h($company->company) ?></td>
                    <td>
                        <img style="width: 200px; border: 1px solid #d7d7d7; padding: 10px" <?= $company->photo ?>/>
                    </td>
                    <td><?= $company->user->name ?></td>
                    <td><?= h($company->email) ?></td>
                    <td><?= h($company->phone) ?></td>
                    <td><?= h($company->fiscal_number) ?></td>
                    <td><?= h($company->address) ?></td>
                    <td><?= $company->has('city') ? $this->Html->link($company->city->name, ['controller' => 'Citys', 'action' => 'view', $company->city->id]) : '' ?></td>
                    <td><?= h($company->cep) ?></td>
                    <td><?= $company->has('state') ? $this->Html->link($company->state->name, ['controller' => 'States', 'action' => 'view', $company->state->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            __('Ver'),
                            ['action' => 'view', $company->id],
                            ['class' => 'btn btn-info']
                        ) ?>
                        <?= $this->Html->link(
                            __('Editar'),
                            ['action' => 'edit', $company->id],
                            ['class' => 'btn btn-warning']
                        ) ?>
                        <?= $this->Html->link(
                            __('Editar Logotipo'),
                            ['action' => 'editPhoto', $company->id],
                            ['class' => 'btn btn-warning']
                        ) ?>
                        <?= $this->Html->link(
                            __('Apagar'),
                            ['action' => 'delete', $company->id],
                            ['class' => 'btn btn-danger']
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Produção</th>
                    <th>Empresa</th>
                    <th>Logotipo</th>
                    <th>Usuário</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Número Fiscal</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>CEP</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

