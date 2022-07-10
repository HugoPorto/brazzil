<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Config $config
 */
?>
<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Configurações</h3>
        </div>

        <?= $this->Form->create($config) ?>

        <div class="card-body">
            


            

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <?php if ($config->status_banner_main) :?>
                        <input class="custom-control-input" type="checkbox" name="status_banner_main" id="status_banner_promocional" value="1" checked>
                    <?php else :?>
                        <input class="custom-control-input" type="checkbox" name="status_banner_main" id="status_banner_promocional" value="0">
                    <?php endif;?>
                    <label for="status_banner_promocional" class="custom-control-label">Banner Promocional</label>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <?php if ($config->show_type_products === 1) :?>
                        <input class="custom-control-input" type="checkbox" name="fisic" id="customCheckbox1" value="1" checked>
                    <?php elseif ($config->show_type_products === 3) :?>
                        <input class="custom-control-input" type="checkbox" name="fisic" id="customCheckbox1" value="1" checked>
                    <?php else :?>
                        <input class="custom-control-input" type="checkbox" name="fisic" id="customCheckbox1" value="1">
                    <?php endif;?>
                    <label for="customCheckbox1" class="custom-control-label">Produtos Físicos</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <?php if ($config->show_type_products === 2) :?>
                        <input class="custom-control-input" type="checkbox" name="digital" id="customCheckbox2" value="1" checked>
                    <?php elseif ($config->show_type_products === 3) :?>
                            <input class="custom-control-input" type="checkbox" name="digital" id="customCheckbox2" value="1" checked>
                    <?php else :?>
                        <input class="custom-control-input" type="checkbox" name="digital" id="customCheckbox2" value="1">
                    <?php endif;?>
                    <label for="customCheckbox2" class="custom-control-label">Produtos Digitais</label>
                </div>
            </div>
            


        <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>

        <?= $this->Form->end() ?>

        </div>
    </div>
</div>

