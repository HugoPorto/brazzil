<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\State $state
 */
?>
<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-striped table_view">
                <tr>
                    <th scope="row"><?= __('Código') ?></th>
                    <td><?= $this->Number->format($state->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Nome') ?></th>
                    <td><?= h($state->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Estado') ?></th>
                    <td><?= h($state->uf) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>