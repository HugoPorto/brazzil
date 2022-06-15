<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Config $config
 */
?>
<div class="col-md-6" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Configurações</h3>
        </div>

        <?= $this->Form->create($config) ?>

        <div class="card-body">
            <div class="form-group">

                <label for="status_banner_promocional">Banner Promocional</label>

                <?php echo $this->Form->control(
                    'status_banner_main',
                    [
                        'label' => false,
                        'id' => 'status_banner_promocional'
                    ]
                );?>

            </div>


        <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>

        <?= $this->Form->end() ?>

        </div>
    </div>
</div>

