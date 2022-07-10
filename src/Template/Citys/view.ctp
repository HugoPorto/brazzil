<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-striped table_view">
                <tr>
                    <th scope="row"><?= __('Código') ?></th>
                    <td><?= $this->Number->format($city->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Nome') ?></th>
                    <td><?= h($city->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Estado') ?></th>
                    <td><?= $city->has('state') ? $this->Html->link($city->state->name, ['controller' => 'States', 'action' => 'view', $city->state->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>