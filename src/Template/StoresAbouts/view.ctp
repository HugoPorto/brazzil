<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesAbout->id]) ?> </li>
        <li><?= $this->Html->link(__('Sobre'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="storesAbouts view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Código') ?></th>
            <td><?= $this->Number->format($storesAbout->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado Em') ?></th>
            <td><?= h($storesAbout->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado Em') ?></th>
            <td><?= h($storesAbout->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Sobre') ?></h4>
        <?= $this->Text->autoParagraph(h($storesAbout->about)); ?>
    </div>
</div>
