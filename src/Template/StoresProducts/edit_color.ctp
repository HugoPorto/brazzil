<div class="storesProducts form large-10 medium-8 columns content">
    <div class="col-md-6">
        <?= $this->Form->create($storesProduct) ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Aplicar Gradiente Vertical de 3 Cores</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch2">
                            <label class="custom-control-label" for="customSwitch2">Aplicar Gradiente Vertical de 2 Cores</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group" id="color_select">
    
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
