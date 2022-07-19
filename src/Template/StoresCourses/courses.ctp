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
                    <td>
                        <b><?= h($courses[1]) ?></b>
                    <br>
                    <br>
                        <img style="width: 450px; border: 0px; padding: 10px" <?= $courses[2] ?>/>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(
                            __('Ver'),
                            ['action' => 'courseView', $courses[0]],
                            ['class' => 'btn btn-info']
                        ) ?>
                        <?= $this->Html->link(
                            __('Gerar Certificado'),
                            ['action' => 'generateCertificate', $courses[0], $courses[1]],
                            [ 'class' => 'btn btn-info', 'target' => '_blank']
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
