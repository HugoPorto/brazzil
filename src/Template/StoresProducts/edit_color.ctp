<div class="storesProducts form large-10 medium-8 columns content">
    <div class="col-md-6">
        <?= $this->Form->create($storesProduct) ?>
            <div class="form-group">

            <label for="description">Cor*</label>

            <?php
                echo $this->Form->control(
                    'color',
                    [
                    'label' => false,
                    'type' => 'color',
                    ]
                );
                ?>

            </div>
        <?= $this->Form->button(__('Editar Cor'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
