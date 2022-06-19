
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCourse $storesCourse
 */
?>
<div class="col-md-6" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Curso</h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($storesCourse, ['type' => 'file']) ?>

            <div class="form-group">
                <label for="photo">Foto*</label>
                <?= $this->Form->control(
                    'photo[]',
                    [
                        'label' => false,
                        'id' => 'photo',
                        'type' => 'file',
                        'multiple' => false,
                        'required' => true
                    ]
                ) ?>
            </div>

            <?= $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser]) ?>
            <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
