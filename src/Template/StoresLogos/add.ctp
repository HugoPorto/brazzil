<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Ver Logo'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesLogos form large-9 medium-8 columns content">
    <?= $this->Form->create($storesLogo, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Adicionar Logo') ?></legend>
        <?php
            echo $this->Form->control('logo[]', ['label' => false, 'type' => 'file', 'multiple' => false]);
            echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser, 'class' => 'form-control']);
            echo $this->Form->control('galerys_id', ['type' => 'hidden', 'value' => '13', 'class' => 'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>
