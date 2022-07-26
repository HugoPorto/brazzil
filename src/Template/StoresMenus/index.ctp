<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresMenu[]|\Cake\Collection\CollectionInterface $storesMenus
 */
?>
<div class="card" style="border: 1px solid #D7D7D7; padding: 10px; box-shadow: 5px 10px #888888;">
    <div class="card-body">
        <div class="margin">
        <p><?= $this->Flash->render() ?></p>
            <div class="btn-group">
                <?= $this->Html->link(__('Adicionar Nova Ementa'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <br>
        <table id="general" class="table table-borderless table-sm" style="font-size: 13px">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Menu</th>
                    <th>Curso</th>
                    <th>Usuário</th>
                    <th>Compania</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesMenus as $storesMenu) : ?>
                <tr>
                    <td><?= $this->Number->format($storesMenu->id) ?></td>
                    <td><?= h($storesMenu->menu) ?></td>
                    <td><?= $storesMenu->has('stores_course') ? $this->Html->link($storesMenu->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $storesMenu->stores_course->id]) : '' ?></td>
                    <td><?= $storesMenu->has('user') ? $storesMenu->user->name : '' ?></td>
                    <td><?= $storesMenu->has('company') ? $this->Html->link($storesMenu->company->company, ['controller' => 'Companys', 'action' => 'view', $storesMenu->company->id]) : '' ?></td>
                    <td><?= h($storesMenu->created) ?></td>
                    <td><?= h($storesMenu->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            __('Editar'),
                            ['action' => 'edit', $storesMenu->id],
                            ['class' => 'btn btn-warning']
                        ) ?>
                        <?= $this->Form->postLink(
                            __('Deletar'),
                            ['action' => 'delete', $storesMenu->id],
                            ['class' => 'btn btn-danger']
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Menu</th>
                    <th>Curso</th>
                    <th>Usuário</th>
                    <th>Compania</th>
                    <th>Criado Em</th>
                    <th>Última Modificação</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

