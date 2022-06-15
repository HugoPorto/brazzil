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
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $config->id], ['class' => 'btn btn-info']) ?>
                </div>
            </div>
            <table class="vertical-table table table-bordered" style="margin-top: 20px">
                <tr>
                    <th scope="row"><?= __('Código') ?></th>
                    <td><?= $this->Number->format($config->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Status Banner Promocional') ?></th>
                    <td><?= $config->status_banner_main ? __('Ativo') : __('Inativo'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>