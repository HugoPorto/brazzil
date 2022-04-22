<div class="storesSliders index large-12 medium-11 columns content">
    <h3><?= __('Banners') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('código') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slider') ?></th>
                <th scope="col"><?= $this->Paginator->sort('título') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subtitulo') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesSliders as $storesSlider) : ?>
            <tr>
                <td><?= $this->Number->format($storesSlider->id) ?></td>
                <td>
                    <?php echo $this->Html->image('galerys/12/' . $storesSlider->slider); ?>
                </td>
                <td><?= h($storesSlider->title) ?></td>
                <td><?= h($storesSlider->subtitle) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesSlider->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesSlider->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')]) ?></p>
    </div>
</div>
