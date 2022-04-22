<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $storesStripeConfig->id],
            ['confirm' => __('Você tem certeza que quer apagar essas chaves # {0}?', $storesStripeConfig->id)]
        )
                            ?></li>
        <li><?= $this->Html->link(__('List Chaves'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesStripeConfigs form large-9 medium-8 columns content">
    <?= $this->Form->create($storesStripeConfig) ?>
    <fieldset>
        <legend><?= __('Adicionar Chaves') ?></legend>

        <label>Chave Pública*</label>
        <?php echo $this->Form->control('stripe_key', ['label' => false]); ?>
        <label>Chave Secreta*</label>
        <?php echo $this->Form->control('stripe_secret', ['label' => false]);?>
        <?php echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser, 'class' => 'form-control']); ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
