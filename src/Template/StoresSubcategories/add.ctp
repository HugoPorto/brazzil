<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresSubcategory $storesSubcategory
 */
?>
<div class="col-md-6" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Nova Subcategoria</h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($storesSubcategory) ?>

            <div class="form-group">
                <label for="subcategory">Subcategoria*</label>
                <?= $this->Form->control(
                    'subcategory',
                    [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'subcategory'
                    ]
                ) ?>
            </div>

            <div class="form-group">
                <label for="stores_categories_id">Categoria*</label>
                <?= $this->Form->control(
                    'stores_categories_id',
                    [
                        'label' => false,
                        'id' => 'stores_categories_id',
                        'required' => true,
                        'options' => $storesCategories
                    ]
                ) ?>


                <?= $this->Form->control(
                    'users_id',
                    [
                            'type' => 'hidden',
                            'value' => $idUser
                        ]
                ) ?>
            </div>

            <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
