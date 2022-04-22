<div class="storesFooters form large-12 medium-8 columns content">
    <?= $this->Form->create($storesFooter) ?>
    <fieldset>
        <legend><?= __('Editar Rodapé') ?></legend>

        <label>Rodapé</label>
        <?php
            echo $this->Form->control('footer', [
                'label' => false
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
