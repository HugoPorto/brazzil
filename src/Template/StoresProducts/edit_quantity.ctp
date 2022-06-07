<div class="storesProducts form large-10 medium-8 columns content">
    <div class="col-md-6">
        <?= $this->Form->create($storesProduct) ?>
            <div class="form-group">

            <label for="description">Cor*</label>

            <?php
                echo $this->Form->control(
                    'quantity',
                    [
                    'label' => false]
                );
                ?>

            </div>
        <?= $this->Form->button(__('Editar Quantidade'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
