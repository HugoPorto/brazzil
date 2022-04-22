<div class="storesMessages index large-12 medium-8 columns content">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('código') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Criado Em') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Modificado Em') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesMessages as $storesMessage): ?>
            <tr>
                <td><?= $this->Number->format($storesMessage->id) ?></td>
                <td><?= h($storesMessage->name) ?></td>
                <td><?= h($storesMessage->email) ?></td>
                <td><?= h($storesMessage->created) ?></td>
                <td><?= h($storesMessage->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storesMessage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesMessage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesMessage->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) out of {{count}} total')]) ?></p>
    </div>
</div>
