<div class="storesProducts form large-10 medium-8 columns content">
    <div class="col-md-6">
        <?= $this->Form->create($storesProduct) ?>
            <fieldset style="margin-bottom: 10px;">
                <legend><?= __('Editar QrCode') ?></legend>

                <label for="product">QrCode</label>
                <?php

                    echo $this->Form->control('qrcode', [
                        'label' => false,
                        'type' => 'text',
                        'class' => 'form-control'
                    ]);
                    ?>

            </fieldset>
        <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
