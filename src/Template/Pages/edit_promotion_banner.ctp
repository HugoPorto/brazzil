<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresPartner $storesPartner
 */
?>
<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Adicionar Banner</h3>
        </div>

        <?= $this->Form->create($home, ['type' => 'file']) ?>

        <div class="card-body">

            <div class="form-group">
                <label for="banner">Banner</label>
                <?php echo $this->Form->control('banner[]', [
                    'label' => false,
                    'id' => 'banner',
                    'type' => 'file',
                    'multiple' => false
                    ]); ?>
            </div>

            <?php  echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser]); ?>

            <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>

            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
