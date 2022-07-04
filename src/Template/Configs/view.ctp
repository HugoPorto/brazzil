<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="form-group">
                <div class="btn-group">
                    <?= $this->Html->link(__('Editar Todas as Configurações'), ['action' => 'edit', $config->id], ['class' => 'btn btn-info']) ?>
                </div>
            </div>
            <table class="vertical-table table table-striped table_view">
                <tr>
                    <th scope="row"><?= __('Status Banner Promocional') ?></th>
                    <td>
                        <?= $config->status_banner_main ? __('Ativo') : __('Inativo'); ?>
                    </td>
                    <td>
                        <div class="btn-group">
                        <?= $this->Html->link(
                            __('Alterar'),
                            ['action' => 'updateStatusBannerPromocional', base64_encode($config->id), base64_encode($config->status_banner_main)],
                            ['class' => 'btn btn-warning']
                        ) ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Exibição de Produtos') ?></th>
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
                            <?= $this->Html->link(
                                __('Alterar'),
                                ['action' => 'updateShowProducts', base64_encode($config->id), base64_encode($config->show_type_products)],
                                ['class' => 'btn btn-warning']
                            ) ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>