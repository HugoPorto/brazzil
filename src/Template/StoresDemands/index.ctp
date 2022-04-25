<div class="card">
    <div class="card-body">
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Usuário</th>
                    <th>Criado Em</th>
                    <th>Modificado Em</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesDemands as $storesDemand) : ?>
                <tr>
                    <td><?= $this->Number->format($storesDemand->id) ?></td>
                    <td><?= $storesDemand->user->name ?></td>
                    <td><?= h($storesDemand->created) ?></td>
                    <td><?= h($storesDemand->modified) ?></td>
                    <td>
                        <?php if ($storesDemand->status) :?>
                            <span class="badge badge-success">Processado</span>
                        <?php else :?>
                            <span class="badge badge-danger">Processando..</span>
                        <?php endif;?>
                    </td>
                    <td class="actions">
                        <div class="margin">
                            <?php if (!$storesDemand->status) :?>
                                <div class="btn-group">
                                    <button class="btn btn-warning" onclick="updateDemand(<?= $storesDemand->id; ?>)">
                                        Atualizar Status
                                    </button>
                                </div>
                            <?php endif;?>
                            <div class="btn-group">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesDemand->id], ['class' => 'btn btn-info']) ?>
                            </div>
                            <div class="btn-group">

                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" onclick="showAddress(<?= $storesDemand->id; ?>)">
                                Visualizar Endereço de Entrega
                            </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Usuário</th>
                    <th>Criado Em</th>
                    <th>Modificado Em</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="modal hide fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Endereço de Entrega</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body-address">
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>


