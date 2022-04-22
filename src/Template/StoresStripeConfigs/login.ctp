<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Chaves'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesStripeConfigs form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Login Super Usuário') ?></legend>
        <label>Superpass*</label>
        <?php echo $this->Form->control('superpass', ['label' => false, 'required' => true]);?>
        <?php echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser, 'class' => 'form-control']); ?>
    </fieldset>
    <?= $this->Form->button(__('Logar')) ?>
    <?= $this->Form->end() ?>
</div>
