<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoursesDownload $coursesDownload
 */
?>
<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Novo Item Para Download</h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($coursesDownload) ?>

            <div class="form-group">
                <label for="link">Link*</label>
                <?= $this->Form->control(
                    'link',
                    [
                        'label' => false,
                        'class' => 'form-control',
                    ]
                ) ?>
            </div>

            <div class="form-group">
                <label for="stores_courses_id">Curso*</label>
                <?= $this->Form->control(
                    'stores_courses_id',
                    [
                        'options' => $storesCourses,
                        'label' => false,
                        'class' => 'form-control',
                    ]
                ) ?>
            </div>

            <div class="form-group">
                <label for="stores_videos_id">Aula*</label>
                <?= $this->Form->control(
                    'stores_videos_id',
                    [
                        'label' => false,
                        'class' => 'form-control',
                        'options' => $storesVideos
                    ]
                ) ?>
            </div>

            <div class="form-group">
                <label for="description">Descrição*</label>
                <?= $this->Form->control(
                    'description',
                    [
                        'label' => false,
                        'class' => 'form-control',
                    ]
                ) ?>
            </div>

            <?= $this->Form->control(
                'users_id',
                [
                        'type' => 'hidden',
                        'value' => $idUser
                    ]
            ) ?>

            <?= $this->Form->control(
                'companys_id',
                [
                        'type' => 'hidden',
                        'value' => $idCompany
                    ]
            ) ?>

            <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
