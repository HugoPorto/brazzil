<div class="col-md-6" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Adicionar Novo Produto</h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($storesProduct, ['type' => 'file']) ?>
                <fieldset style="margin-bottom: 10px;">
                    <legend><?= __('Editar Produto') ?></legend>

                    <div class="form-group">

                        <label for="description">Foto*</label>

                        <?php
                            echo $this->Form->control(
                                'photo[]',
                                [
                                'label' => false,
                                'required' => true,
                                'type' => 'file',
                                'multiple' => false
                                ]
                            );
                            ?>

                    </div>

                    <div class="form-group">

                        <label for="description">Foto 2*</label>

                        <?php
                            echo $this->Form->control(
                                'photo2[]',
                                [
                                'label' => false,
                                'required' => true,
                                'type' => 'file',
                                'multiple' => false
                                ]
                            );
                            ?>

                    </div>

                    <div class="form-group">

                        <label for="description">Foto 3*</label>

                        <?php
                            echo $this->Form->control(
                                'photo3[]',
                                [
                                'label' => false,
                                'required' => true,
                                'type' => 'file',
                                'multiple' => false
                                ]
                            );
                            ?>

                    </div>

                    <div class="form-group">

                        <label for="description">Foto 4*</label>

                        <?php
                            echo $this->Form->control(
                                'photo4[]',
                                [
                                'label' => false,
                                'required' => true,
                                'type' => 'file',
                                'multiple' => false
                                ]
                            );
                            ?>

                    </div>

                    <div class="form-group">

                        <label for="description">Foto 5*</label>

                        <?php
                            echo $this->Form->control(
                                'photo5[]',
                                [
                                'label' => false,
                                'required' => true,
                                'type' => 'file',
                                'multiple' => false
                                ]
                            );
                            ?>

                    </div>

                </fieldset>
            <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
