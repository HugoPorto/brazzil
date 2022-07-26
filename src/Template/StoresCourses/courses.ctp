<div class="card">
    <div class="card-body">
        <p><?= $this->Flash->render() ?></p>
        <table id="general" class="table table-borderless" style="font-size: 13px">
            <thead>
                <tr>
                    <th>Meus Cursos</th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses_user as $courses) : ?>
                <tr>
                    <td>
                        <h4><?= h($courses[1]) ?></h4>
                    <br>
                    <br>
                        <a href="<?= $this->request->base . '/stores-courses/courseView/' .  $courses[0] ?>"><img class="image-table-course" <?= $courses[2] ?>/></a>
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
                    <th>Meus Cursos</th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
