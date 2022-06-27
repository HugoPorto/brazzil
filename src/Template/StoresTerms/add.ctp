<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresTerm $storesTerm
 */
?>
<div class="col-md-6" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Adicionar Termos</h3>
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

                    echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser]);

                    ?>

            </div>


        <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>

        <?= $this->Form->end() ?>

        </div>
    </div>
</div>


