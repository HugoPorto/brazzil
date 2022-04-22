<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesHour->id]) ?> </li>
    </ul>
</nav>
<div class="storesHours view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Horário') ?></th>
            <td><?= h($storesHour->hour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Código') ?></th>
            <td><?= $this->Number->format($storesHour->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Em') ?></th>
            <td><?= h($storesHour->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Em') ?></th>
            <td><?= h($storesHour->modified) ?></td>
        </tr>
    </table>
</div>
