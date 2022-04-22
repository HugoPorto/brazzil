<div class="storesSuperpass index large-12 medium-11 columns content">
    <h3><?= __('Superpass') ?></h3>

    <?php if (empty($storesSuperpass->toArray())) : ?>
        <?= $this->Html->link(__('Adicionar Superpass'), ['action' => 'add']) ?>
    <?php endif; ?>

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Superpass') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Criado Em') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Última Atualização') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesSuperpass as $storesSuperpas) : ?>
            <tr>
                <td><?= h($storesSuperpas->superpass) ?></td>
                <td><?= h($storesSuperpas->created) ?></td>
                <td><?= h($storesSuperpas->modified) ?></td>
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
