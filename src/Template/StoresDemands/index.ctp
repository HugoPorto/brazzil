<div class="storesDemands index large-12 medium-11 columns content">
    <h3><?= __('Pedidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Código') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Usuário') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Criado Em') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Modificado Em') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesDemands as $storesDemand) : ?>
            <tr>
                <td><?= $this->Number->format($storesDemand->id) ?></td>
                <td><?= $storesDemand->user->name ?></td>
                <td><?= h($storesDemand->created) ?></td>
                <td><?= h($storesDemand->modified) ?></td>
                <td>
                    <?php if ($storesDemand->status) :?>
                        Processado..
                    <?php else :?>
                        Porcessando..
                    <?php endif;?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesDemand->id]) ?>
                    <?php if (!$storesDemand->status) :?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesDemand->id]) ?>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')]) ?></p>
    </div>
</div>
