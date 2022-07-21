<div class="row">
    <div class=col-md-8>
        <div class="video-container" style="margin-top: 5px">
            <?= $storesVideo->video;?>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class=col-md-8>
        <div class="margin">
            <?php if (empty($viewed->toArray())) :?>
                <div class="btn-group">
                    <?= $this->Html->link(
                        __('Marcar Como Visto'),
                        ['controller' => 'StoresCourses', 'action' => 'updateViewdVideo', $storesVideo->id, $storesVideo->stores_courses_id],
                        ['class' => 'btn btn-warning']
                    ) ?>
                </div>
            <?php endif;?>
            <?php foreach ($downloads as $download) : ?>
                <a href="<?= $download->link ?>" class="btn btn-info" target="_blank">Download</a>
            <?php endforeach; ?>
        </div>
    </div>
</div>