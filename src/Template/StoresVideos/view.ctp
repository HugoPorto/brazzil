<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresVideo $storesVideo
 */
?>
<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-striped table_view">
                <tr>
                    <th scope="row"><?= __('Título') ?></th>
                    <td><?= h($storesVideo->title) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Video') ?></th>
                    <td>
                        <div class=row>
                            <div class=col-md-8>
                                <div class="video-container" style="margin-top: 5px">
                                    <?= $storesVideo->video;?>
                                </div>      
                            </div>      
                        </div>      
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Curso') ?></th>
                    <td><?= $storesVideo->has('stores_course') ? $this->Html->link($storesVideo->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $storesVideo->stores_course->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado Em') ?></th>
                    <td><?= h($storesVideo->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Útima Modificação') ?></th>
                    <td><?= h($storesVideo->modified) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Foto') ?></th>
                    <td>
                        <img style="width: 200px; border: 1px solid #d7d7d7; padding: 10px" <?= $storesVideo->photo ?>/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Descrição') ?></th>
                    <td>
                        <?= $this->Text->autoParagraph(h($storesVideo->description)); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>