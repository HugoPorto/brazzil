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
                    <td><?= $slide->has('stores_course') ? $this->Html->link($slide->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $slide->stores_course->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Usuário') ?></th>
                    <td><?= $slide->has('user') ? $slide->user->name : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Empresa') ?></th>
                    <td><?= $slide->has('company') ? $this->Html->link($slide->company->company, ['controller' => 'Companys', 'action' => 'view', $slide->company->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado Em') ?></th>
                    <td><?= h($slide->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Última Modificação') ?></th>
                    <td><?= h($slide->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>