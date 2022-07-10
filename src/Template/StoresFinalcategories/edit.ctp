<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresFinalcategory $storesFinalcategory
 */
?>
<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Categoria Final</h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($storesFinalcategory) ?>

            <div class="form-group">
                <label for="category">Categoria*</label>
                <?= $this->Form->control(
                    'category',
                    [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'category',
                        'required' => true
                    ]
                ) ?>
            </div>

            <div class="form-group">
                <label for="stores_subcategories_id">Subcategoria*</label>
                <?= $this->Form->control(
                    'stores_subcategories_id',
                    [
                        'label' => false,
                        'id' => 'stores_subcategories_id',
                        'required' => true,
                        'options' => $storesSubcategories
                    ]
                ) ?>
            </div>

            <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

