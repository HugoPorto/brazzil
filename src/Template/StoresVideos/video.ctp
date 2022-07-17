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
            <?php if (!$storesVideo->viewed) :?>
                <div class="btn-group">
                    <?= $this->Html->link(
                        __('Marcar Como Visto'),
                        ['controller' => 'StoresCourses', 'action' => 'updateViewdVideo', $storesVideo->id],
                        ['class' => 'btn btn-warning']
                    ) ?>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>