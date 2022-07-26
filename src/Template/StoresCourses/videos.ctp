<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresVideo[]|\Cake\Collection\CollectionInterface $storesVideos
 */
?>
<div class="card">
    <div class="card-body">
        <table id="general" class="table table-borderless" style="font-size: 13px">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Video</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesVideos as $storesVideo) : ?>
                <tr>
                    <td><?= $this->Number->format($storesVideo->id) ?></td>
                    <td><?= h($storesVideo->title) ?></td>
                    <td>
                        <div class="btn-group">
                            <?= $this->Html->link(
                                __('Assistir'),
                                ['controller' => 'StoresVideos', 'action' => 'video', $storesVideo->id],
                                ['class' => 'btn btn-info']
                            ) ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Video</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
