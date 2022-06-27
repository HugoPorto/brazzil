<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Config $config
 */
?>
<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="form-group">
                <div class="btn-group">
                    <?= $this->Html->link(__('Editar Todas as Configurações'), ['action' => 'edit', $config->id], ['class' => 'btn btn-info']) ?>
                </div>
            </div>
            <table class="vertical-table table table-striped" style="margin-top: 20px">
                <tr>
                    <th scope="row"><?= __('Status Banner Promocional') ?></th>
                    <td>
                        <?= $config->status_banner_main ? __('Ativo') : __('Inativo'); ?>
                    </td>
                    <td>
                        <div class="btn-group">
                        <?= $this->Html->link(__('Alterar'), ['action' => 'index'], ['class' => 'btn btn-info']) ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Status Banner Promocional') ?></th>
                    <td>
                        <?php
                        switch ($config->show_type_products) {
                            case 1:
                                echo "Exibindo apenas produtos físicos";
                                break;
                            case 2:
                                echo "Exibindo apenas produtos digitais.";
                                break;
                            case 3:
                                echo "Exibindo produtos físicos e digitais.";
                                break;
                        }
                        ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <?= $this->Html->link(__('Alterar'), ['action' => 'index'], ['class' => 'btn btn-info']) ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>