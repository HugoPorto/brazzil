<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresVideo[]|\Cake\Collection\CollectionInterface $storesVideos
 */
?>
<div class="card">
    <div class="card-body">
        <div class="margin">
        <p><?= $this->Flash->render() ?></p>
            <div class="btn-group">
                <?= $this->Html->link(__('Adicionar Nova Categoria'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <br>
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Video</th>
                    <th>Título</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th>Curso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesVideos as $storesVideo) : ?>
                <tr>
                    <td><?= $this->Number->format($storesVideo->id) ?></td>
                    <td><?= h($storesVideo->video) ?></td>
                    <td><?= h($storesVideo->title) ?></td>
                    <td><?= h($storesVideo->created) ?></td>
                    <td><?= h($storesVideo->modified) ?></td>
                    <td><?= $storesVideo->has('stores_course') ? $this->Html->link($storesVideo->stores_course->id, ['controller' => 'StoresCourses', 'action' => 'view', $storesVideo->stores_course->id]) : '' ?></td>
                    <td><?= $storesVideo->has('user') ? $this->Html->link($storesVideo->user->name, ['controller' => 'Users', 'action' => 'view', $storesVideo->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $storesVideo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storesVideo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storesVideo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesVideo->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Video</th>
                    <th>Título</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th>Curso</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>