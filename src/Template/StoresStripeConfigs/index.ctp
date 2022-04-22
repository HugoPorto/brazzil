<div class="storesStripeConfigs index large-12 medium-11 columns content">
    <h3><?= __('Configurações') ?></h3>

    <?php if (empty($storesStripeConfigs->toArray())) : ?>
        <?= $this->Html->link(__('Adicionar Chaves'), ['action' => 'add']) ?>
    <?php endif; ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Código') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Chave Púbçica') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Chave Secreta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Criado Em') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Última Modificação') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesStripeConfigs as $storesStripeConfig) : ?>
            <tr>
                <td>
                    <?= $this->Number->format($storesStripeConfig->id) ?>
                </td>
                <td>
                    <?= h($storesStripeConfig->stripe_key) ?>
                </td>
                <td>
                    <?php if ($showStripeKeys) : ?>
                        <?= h($storesStripeConfig->stripe_secret) ?>
                    <?php else : ?>
                        <?= $this->Html->link(__('Login Super Usuário'), ['action' => 'login', $storesStripeConfig->id]) ?>
                    <?php endif; ?>
                </td>
                <td><?= h($storesStripeConfig->created) ?></td>
                <td><?= h($storesStripeConfig->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesStripeConfig->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesStripeConfig->id]) ?>
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $storesStripeConfig->id], ['confirm' => __('Você tem certeza que quer apagar o registro # {0}?', $storesStripeConfig->id)]) ?>
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
