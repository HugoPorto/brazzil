<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCategory $storesCategory
 */
?>
<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Adicionar Nova Categoria</h3>
        </div>

        <?= $this->Form->create($storesCategory) ?>

        <div class="card-body">

            <div class="form-group">

                <label for="category">Categoria</label>

                <?php
                    echo $this->Form->control('category', [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'category'
                    ]);
                    ?>

            </div>

            <div class="form-group">

                <label for="status_menu">Status Menu</label>

                <?php
                    echo $this->Form->control('status_menu', [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'status_menu'
                    ]);
                    ?>

            </div>

            <input
                type="hidden"
                class="form-control"
                name="users_id"
                value="<?= $idUser ?>"/>


        <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>

        <?= $this->Form->end() ?>

        </div>
    </div>
</div>

