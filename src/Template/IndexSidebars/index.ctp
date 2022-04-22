<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Index Sidebar'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Category Sidebars'), ['controller' => 'CategorySidebars', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category Sidebar'), ['controller' => 'CategorySidebars', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="indexSidebars index large-10 medium-8 columns content">
    <h3><?= __('Index Sidebars') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sidebar') ?></th>
                <th scope="col"><?= $this->Paginator->sort('icon') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('roles_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_sidebars_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($indexSidebars as $indexSidebar): ?>
            <tr>
                <td><?= $this->Number->format($indexSidebar->id) ?></td>
                <td><?= h($indexSidebar->sidebar) ?></td>
                <td><?= h($indexSidebar->icon) ?></td>
                <td><?= h($indexSidebar->url) ?></td>
                <td><?= $indexSidebar->has('role') ? $this->Html->link($indexSidebar->role->role, ['controller' => 'Roles', 'action' => 'view', $indexSidebar->role->id]) : '' ?></td>
                <td><?= $indexSidebar->has('category_sidebar') ? $this->Html->link($indexSidebar->category_sidebar->category, ['controller' => 'CategorySidebars', 'action' => 'view', $indexSidebar->category_sidebar->id]) : '' ?></td>
                <td><?= $indexSidebar->has('user') ? $this->Html->link($indexSidebar->user->name, ['controller' => 'Users', 'action' => 'view', $indexSidebar->user->id]) : '' ?></td>
                <td><?= h($indexSidebar->created) ?></td>
                <td><?= h($indexSidebar->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $indexSidebar->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $indexSidebar->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $indexSidebar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $indexSidebar->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
