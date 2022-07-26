<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCourse[]|\Cake\Collection\CollectionInterface $storesCourses
 */
?>
<div class="card">
    <div class="card-body">
        <table id="general" class="table table-borderless" style="font-size: 13px">
            <thead>
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
                        <?= $certificate->has('stores_course') ? $certificate->stores_course->course : '' ?>
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
