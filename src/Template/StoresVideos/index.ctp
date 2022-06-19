<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresVideo[]|\Cake\Collection\CollectionInterface $storesVideos
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
                    <th>Título</th>
                    <th>Video</th>
                    <th>Foto</th>
                    <th>Curso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesVideos as $storesVideo) : ?>
                <tr>
                    <td><?= $this->Number->format($storesVideo->id) ?></td>
                    <td><?= h($storesVideo->title) ?></td>
                    <td><?= h($storesVideo->video) ?></td>
                    <td>
                        <img style="width: 200px; border: 1px solid #d7d7d7; padding: 10px" <?= $storesVideo->photo ?>/>
                    </td>
                    <td><?= $storesVideo->has('stores_course') ? $this->Html->link($storesVideo->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $storesVideo->stores_course->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            __('Ver'),
                            ['action' => 'view', $storesVideo->id],
                            ['class' => 'btn btn-info']
                        ) ?>
                        <?= $this->Html->link(
                            __('Editar'),
                            ['action' => 'edit', $storesVideo->id],
                            [ 'class' => 'btn btn-warning']
                        ) ?>
                        <?= $this->Html->link(
                            __('Editar Foto'),
                            ['action' => 'editPhoto', $storesVideo->id],
                            [ 'class' => 'btn btn-warning']
                        ) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $storesVideo->id],
                            ['confirm' => __('Você tem certeza que deseja apagar esse item?', $storesVideo->id), 'class' => 'btn btn-danger']
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Video</th>
                    <th>Foto</th>
                    <th>Curso</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>