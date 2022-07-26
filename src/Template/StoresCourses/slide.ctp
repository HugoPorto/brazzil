<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slide $slide
 */
?>

<div class="card card-custom">
    <div class="card-body">
        <div class="row">
            <div class=col-md-8>
                <div class="video-container" style="margin-top: 5px">
                    <?= $slide->slide ?>
                </div>
            </div>
        </div>
        <div class="margin">
            <table class="vertical-table table table-borderless table-sm table_view">
                <tr>
                    <th scope="row"><?= __('Curso') ?></th>
                    <td><?= $slide->has('stores_course') ? $slide->stores_course->course : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>