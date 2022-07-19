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
                    <th>Código</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($certificates as $certificate) : ?>
                <tr>
                    <td><?= $this->Number->format($certificate->id) ?></td>
                    <td>
                        <?= $certificate->has('stores_course') ? $this->Html->link($certificate->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $certificate->stores_course->id]) : '' ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Curso</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
