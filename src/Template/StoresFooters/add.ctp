<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Footer'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesFooters form large-10 medium-8 columns content">
    <?= $this->Form->create($storesFooter) ?>
    <fieldset>
        <legend><?= __('Add Stores Footer') ?></legend>
        <?php
            echo $this->Form->control('footer');
        ?>

        <input
            type="hidden"
            class="form-control"
            name="users_id"
            value="<?= $idUser ?>"/>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>
