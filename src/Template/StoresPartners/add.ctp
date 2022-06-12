<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresPartner $storesPartner
 */
?>
<div class="col-md-6" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Adicionar Novo Parceiro</h3>
        </div>

        <?= $this->Form->create($storesPartner, ['type' => 'file']) ?>

        <div class="card-body">

            <div class="form-group">
                <label for="partner">Parceiro</label>
                <?php echo $this->Form->control('partner', [
                        'class' => 'form-control',
                        'label' => false,
                        'id' => 'partner'
                    ]); ?>
            </div>

            <div class="form-group">
                <label for="logo">Logo</label>
                <?php echo $this->Form->control('logo[]', [
                    'label' => false,
                    'id' => 'logo',
                    'type' => 'file',
                    'multiple' => false
                    ]); ?>
            </div>

            <?php  echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser]);?>

            <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>

            <?= $this->Form->end() ?>

        </div>
    </div>
</div>