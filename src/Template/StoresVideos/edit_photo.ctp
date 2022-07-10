<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresVideo $storesVideo
 */
?>
<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Adicionar Novo Video</h3>
        </div>

        <?= $this->Form->create($storesVideo, ['type' => 'file']) ?>

        <div class="card-body">

            <div class="form-group">

                <label for="foto">Foto*</label>
                
                <?php
                    echo $this->Form->control(
                        'photo[]',
                        [
                        'label' => false,
                        'required' => true,
                        'type' => 'file',
                        'multiple' => false,
                        'id' => 'foto'
                        ]
                    );
                    ?>

            </div>

        <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>

        <?= $this->Form->end() ?>

        </div>
    </div>
</div>

