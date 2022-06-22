<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCourse[]|\Cake\Collection\CollectionInterface $storesCourses
 */
?>
<div class="card">
    <div class="card-body">
        <table id="general" class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Curso</th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses_user as $courses) : ?>
                <tr>
                    <td><?= h($courses[1]) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            __('Ver'),
                            ['action' => 'courseView', $courses[0]],
                            ['class' => 'btn btn-info']
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Curso</th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
