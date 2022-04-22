<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Contatos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesContacts form large-9 medium-8 columns content">
    <?= $this->Form->create($storesContact) ?>
    <fieldset>
        <legend><?= __('Editar') ?></legend>
        <label>Contatos</label>
        <?php
            echo $this->Form->control('contact', ['label' => false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
