<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCourse[]|\Cake\Collection\CollectionInterface $storesCourses
 */
?>
<div class="card">
    <div class="card-body">
    <div class="margin">
            <div class="btn-group">
                <?= $this->Html->link(__('Adicionar'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <br>
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Curso</th>
                    <th>Autor</th>
                    <th>Tema</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($storesCourses as $storesCourse) : ?>
                <tr>
                    <td><?= $this->Number->format($storesCourse->id) ?></td>
                    <td><?= h($storesCourse->course) ?></td>
                    <td><?= h($storesCourse->autor) ?></td>
                    <td><?= h($storesCourse->theme) ?></td>
                    <td><?= h($storesCourse->created) ?></td>
                    <td><?= h($storesCourse->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            __('Ver'),
                            ['action' => 'view', $storesCourse->id],
                            ['class' => 'btn btn-info']
                        ) ?>
                        <?= $this->Html->link(
                            __('Editar'),
                            ['action' => 'edit', $storesCourse->id],
                            [ 'class' => 'btn btn-warning']
                        ) ?>
                        <?= $this->Html->link(
                            __('Editar Foto'),
                            ['action' => 'editPhoto', $storesCourse->id],
                            [ 'class' => 'btn btn-warning']
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Curso</th>
                    <th>Autor</th>
                    <th>Tema</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
