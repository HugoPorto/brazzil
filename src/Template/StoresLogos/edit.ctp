<div class="col-md-6" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Logo</h3>
        </div>

            <div class="card-body">
                <?= $this->Form->create($storesLogo, ['type' => 'file']) ?>
                <fieldset style="margin-bottom: 10px;">
                    <?php
                        echo $this->Form->control('logo[]', ['label' => false, 'type' => 'file', 'multiple' => false]);
                        echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser, 'class' => 'form-control']);
                        echo $this->Form->control('galerys_id', ['type' => 'hidden', 'value' => '13', 'class' => 'form-control']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

