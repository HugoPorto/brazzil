
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCourse $storesCourse
 */
?>
<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="btn-group">
                <?= $this->Html->link(__('Aulas'), ['action' => 'videos', $storesCourse->id], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <div class="margin">
            <table class="vertical-table table table-striped" style="margin-top: 20px">
                <tr>
                    <th scope="row"><?= __('Código') ?></th>
                    <td><?= $this->Number->format($storesCourse->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Curso') ?></th>
                    <td><?= h($storesCourse->course) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Autor') ?></th>
                    <td><?= h($storesCourse->autor) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Tema') ?></th>
                    <td><?= h($storesCourse->theme) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Foto') ?></th>
                    <td>
                        <img style="width: 500px; border: 1px solid #d7d7d7" <?= $storesCourse->photo ?> />
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado Em') ?></th>
                    <td><?= h($storesCourse->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Última Modificação') ?></th>
                    <td><?= h($storesCourse->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>