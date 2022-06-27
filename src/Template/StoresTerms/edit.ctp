<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresTerm $storesTerm
 */
?>
<div class="col-md-12" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Termos</h3>
        </div>

        <?= $this->Form->create($storesTerm) ?>

        <div class="card-body">

            <div class="form-group">

                <label for="terms">Termos</label>

                <?php
                    echo $this->Form->control('terms', [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'terms'
                    ]);

                    ?>

            </div>


        <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>

        <?= $this->Form->end() ?>

        </div>
    </div>
</div>
