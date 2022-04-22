<div class="storesFooters view large-12 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Código') ?></th>
            <td><?= $this->Number->format($storesFooter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rodapé') ?></th>
            <td><?= h($storesFooter->footer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Em') ?></th>
            <td><?= h($storesFooter->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Em') ?></th>
            <td><?= h($storesFooter->modified) ?></td>
        </tr>
    </table>
</div>
