<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresTitle $storesTitle
 */
?>
<div class="col-md-6" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Título</h3>
        </div>

            <div class="card-body">
            <?= $this->Form->create($storesTitle) ?>
            <fieldset style="margin-bottom: 10px;">

                <label><b>Título*</b></label>
                <?php
                    echo $this->Form->control('title', ['label' => false, 'class' => 'form-control']);
                ?>

            </fieldset>

            <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-warning']) ?>

            <?= $this->Form->end() ?>

            </div>
        </div>
    </div>
</div>

