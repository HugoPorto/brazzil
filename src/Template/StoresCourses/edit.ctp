
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCourse $storesCourse
 */
?>
<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Curso</h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($storesCourse, ['type' => 'file']) ?>

            <div class="form-group">
                <label for="course">Curso*</label>
                <?= $this->Form->control(
                    'course',
                    [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'course'
                    ]
                ) ?>
            </div>

            <div class="form-group">
                <label for="autor">Autor*</label>
                <?= $this->Form->control(
                    'autor',
                    [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'id'
                    ]
                ) ?>
            </div>

            <div class="form-group">
                <label for="theme">Tema*</label>
                <?= $this->Form->control(
                    'theme',
                    [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'theme'
                    ]
                ) ?>
            </div>

            <div class="form-group">
                <label for="price">Preço*</label>
                <?= $this->Form->control(
                    'price',
                    [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'price'
                    ]
                ) ?>
            </div>

            <?= $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser]) ?>
            <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
