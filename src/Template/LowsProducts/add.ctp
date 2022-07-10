<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Nova Baixa</h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($lowsProduct) ?>

                <div class="form-group">
                    <label for="stores-products-id">Produto*</label>
                    <select name="stores_products_id" class="form-control select2bs4" style="width: 100%;" id="stores-products-id">
                        <?php foreach ($storesProducts as $storesProduct) : ?>
                            <option value="<?= $storesProduct->id ?>">
                                <?= 'Nome: ' . $storesProduct->product . ' - Código de Barras: ' . $storesProduct->barcode_code?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantidade*</label>
                    <?php
                        echo $this->Form->control(
                            'quantity',
                            [
                                    'label' => false,
                                    'class' => 'form-control'
                                ]
                        );
                        ?>
                </div>

                <input
                    type="hidden"
                    class="form-control"
                    name="users_id"
                    value="<?= $idUser ?>"/>

            <?= $this->Form->button(__('Dar Baixa'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
