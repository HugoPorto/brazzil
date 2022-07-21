<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoursesDownload[]|\Cake\Collection\CollectionInterface $coursesDownloads
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
                    <th>Link</th>
                    <th>Descrição</th>
                    <th>Curso</th>
                    <th>Video</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th>Usuário</th>
                    <th>Compania</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($coursesDownloads as $coursesDownload) : ?>
                <tr>
                    <td><?= $this->Number->format($coursesDownload->id) ?></td>
                    <td><?= h($coursesDownload->link) ?></td>
                    <td><?= h($coursesDownload->description) ?></td>
                    <td><?= $coursesDownload->has('stores_course') ? $this->Html->link($coursesDownload->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $coursesDownload->stores_course->id]) : '' ?></td>
                    <td><?= $coursesDownload->has('stores_video') ? $this->Html->link($coursesDownload->stores_video->title, ['controller' => 'StoresVideos', 'action' => 'view', $coursesDownload->stores_video->id]) : '' ?></td>
                    <td><?= h($coursesDownload->created) ?></td>
                    <td><?= h($coursesDownload->modified) ?></td>
                    <td><?= $coursesDownload->has('user') ? $coursesDownload->user->name : '' ?></td>
                    <td><?= $coursesDownload->has('company') ? $this->Html->link($coursesDownload->company->company, ['controller' => 'Companys', 'action' => 'view', $coursesDownload->company->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $coursesDownload->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $coursesDownload->id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $coursesDownload->id]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Link</th>
                    <th>Descrição</th>
                    <th>Curso</th>
                    <th>Video</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th>Usuário</th>
                    <th>Compania</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>