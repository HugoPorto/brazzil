<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Logotipo</h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($company, ['type' => 'file']) ?>
                <fieldset class="form-fieldset-window">
                    <div class="form-group">

                        <label for="description">Foto*</label>

                        <?php
                            echo $this->Form->control(
                                'photo[]',
                                [
                                'label' => false,
                                'type' => 'file',
                                'multiple' => false
                                ]
                            );
                            ?>
                    </div>
                </fieldset>
            <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-warning']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
