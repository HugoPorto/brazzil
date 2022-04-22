<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Novo Registro'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tablesroots index large-10 medium-8 columns content">
    <h3><?=__('Tabelas')?></h3>
    <table id="general" class="display">
        <thead>
            <tr>
                <th>Código</th>
                <th>Titulo</th>
                <th>Texto</th>
                <th>Link</th>
                <th>Criado Em</th>
                <th>Modificado Em</th>
                <th><?=__('Ações')?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tablesroots as $tablesroot): ?>
                <tr>
                    <td><?=$this->Number->format($tablesroot->id)?></td>
                    <td><?=h($tablesroot->title)?></td>
                    <td><?=h($tablesroot->text)?></td>
                    <td><?=$this->Html->link($tablesroot->link, $tablesroot->link)?></td>
                    <td><?=h($tablesroot->created)?></td>
                    <td><?=h($tablesroot->modified)?></td>
                    <td class="actions">
                        <?=$this->Html->link(__('Editar'), ['action' => 'edit', $tablesroot->id])?>
                        <?=$this->Form->postLink(__('Deletar'), ['action' => 'delete', $tablesroot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tablesroot->id)])?>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <th>Código</th>
                <th>Titulo</th>
                <th>Texto</th>
                <th>Link</th>
                <th>Criado Em</th>
                <th>Modificado Em</th>
                <th><?=__('Ações')?></th>
            </tr>
        </tfoot>
    </table>
    <br>
    <br>
</div>
