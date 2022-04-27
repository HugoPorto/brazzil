<div class="col-md-6" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Categoria</h3>
        </div>

            <div class="card-body">
                <?= $this->Form->create($storesAbout) ?>
                <fieldset style="margin-bottom: 10px;">
                    <legend><?= __('Editar') ?></legend>
                    <label>Sobre</label>
                    <?php
                        echo $this->Form->control(
                            'about',
                            [
                                'label' => false,
                                'class' => 'form-control'
                            ]
                        );
                        ?>
                </fieldset>
                <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-warning']) ?>
                <?= $this->Form->end() ?>

            </div>
        </div>
    </div>
</div>


