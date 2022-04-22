<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Editar Chaves'), ['action' => 'edit', $storesStripeConfig->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Chaves'), ['action' => 'delete', $storesStripeConfig->id], ['confirm' => __('Você tem certeza que quer apagar as chaves # {0}?', $storesStripeConfig->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Chaves'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="storesStripeConfigs view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Chave Pública') ?></th>
            <td><?= h($storesStripeConfig->stripe_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chave Secreta') ?></th>
            <td><?= h($storesStripeConfig->stripe_secret) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Em') ?></th>
            <td><?= h($storesStripeConfig->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Última Modificação') ?></th>
            <td><?= h($storesStripeConfig->modified) ?></td>
        </tr>
    </table>
</div>
