<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresVideo $storesVideo
 */
?>

<div class="col-md-6" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Adicionar Novo Video</h3>
        </div>

        <?= $this->Form->create($storesVideo, ['type' => 'file']) ?>

        <div class="card-body">

            <div class="form-group">

                <label for="title">Título*</label>

                <?php
                    echo $this->Form->control('title', [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'title'
                    ]);
                    ?>

            </div>

            <div class="form-group">

                <label for="video">Video*</label>

                <?php
                    echo $this->Form->control('video', [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'video'
                    ]);
                    ?>

            </div>

            <div class="form-group">

                <label for="description">Descrição*</label>

                <?php
                    echo $this->Form->control('description', [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'description'
                    ]);
                    ?>

            </div>

            <div class="form-group">

                <label for="Curso">Curso*</label>
                
                <?php
                    echo $this->Form->control('stores_courses_id', ['label' => false, 'options' => $storesCourses]);
                ?>

            </div>

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

            <?php
                echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser]);
            ?>


        <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>

        <?= $this->Form->end() ?>

        </div>
    </div>
</div>

