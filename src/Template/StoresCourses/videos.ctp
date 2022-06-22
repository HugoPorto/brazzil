<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresVideo[]|\Cake\Collection\CollectionInterface $storesVideos
 */
?>
<div class="card">
    <div class="card-body">
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
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
                        <div class=row>
                            <div class=col-md-8 style="width: 600px">
                                <div class="video-container" style="margin-top: 5px;">
                                    <?= $storesVideo->video;?>
                                </div>      
                            </div>      
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
