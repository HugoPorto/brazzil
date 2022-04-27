<div class="storesProducts form large-10 medium-8 columns content">
<?= $this->Form->create($storesProduct, ['type' => 'file']) ?>
    <fieldset style="margin-bottom: 10px;">
        <legend><?= __('Editar Produto') ?></legend>

        <label for="description">Foto*</label>

        <?php
            echo $this->Form->control('photo[]', ['label' => false, 'type' => 'file', 'multiple' => false]);
        ?>

    </fieldset>
    <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>
    <?= $this->Form->end() ?>
</div>
