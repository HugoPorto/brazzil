<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Login</h3>
        </div>

            <div class="card-body">
            <?= $this->Form->create() ?>
            <fieldset class="form-fieldset-window">
                <legend><?= __('Login Super Usuário') ?></legend>
                <label>Superpass*</label>
                <?php echo $this->Form->control('superpass', ['type' => 'password', 'label' => false, 'required' => true , 'class' => 'form-control']);?>
                <?php echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser, 'class' => 'form-control']); ?>
            </fieldset>
            <?= $this->Form->button(__('Logar'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>

            </div>
        </div>
    </div>
</div>
