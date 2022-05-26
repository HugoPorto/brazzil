
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCourse $storesCourse
 */
?>
<div class="col-md-6" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Novo Curso</h3>
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

            <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
