<div class="storesMessages view large-12 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Código') ?></th>
            <td><?= $this->Number->format($storesMessage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($storesMessage->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($storesMessage->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Em') ?></th>
            <td><?= h($storesMessage->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Em') ?></th>
            <td><?= h($storesMessage->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Mensagem') ?></h4>
        <?= $this->Text->autoParagraph(h($storesMessage->message)); ?>
    </div>
</div>
