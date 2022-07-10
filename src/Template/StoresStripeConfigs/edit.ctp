<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Banner</h3>
        </div>

            <div class="card-body">
            <?= $this->Form->create($storesStripeConfig) ?>
            <fieldset class="form-fieldset-window">

                <label>Chave Pública*</label>
                <?php echo $this->Form->control('stripe_key', ['label' => false, 'class' => 'form-control']); ?>
                <label>Chave Secreta*</label>
                <?php echo $this->Form->control('stripe_secret', ['label' => false, 'class' => 'form-control']);?>
                <?php echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser, 'class' => 'form-control']); ?>
            </fieldset>
            <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>

            </div>
        </div>
    </div>
</div>
