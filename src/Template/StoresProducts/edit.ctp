<div class="col-md-12" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Produto</h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($storesProduct, ['type' => 'file']) ?>

                <div class="row" style="padding: 0px">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="product">Produto*</label>

                            <?php

                                echo $this->Form->control('product', [
                                    'label' => false,
                                    'class' => 'form-control'
                                ]);
                                ?>

                        </div>

                        <div class="form-group">

                            <label for="description">Descrição*</label>

                            <?php
                                echo $this->Form->control('description', [
                                    'label' => false,
                                    'class' => 'form-control'
                                ]);
                                ?>

                        </div>

                        <div class="form-group">

                            <label for="description">Preço*</label>

                            <?php
                                echo $this->Form->control('price', [
                                    'label' => false,
                                    'class' => 'form-control'
                                ]);
                                ?>

                            <input
                                type="hidden"
                                class="form-control"
                                name="users_id"
                                value="<?= $idUser ?>"/>

                        </div>

                        <div class="form-group">

                            <label for="description">Cor*</label>

                            <?php
                                echo $this->Form->control(
                                    'color',
                                    [
                                    'label' => false,
                                    'type' => 'color'
                                    ]
                                );
                                ?>

                        </div>

                        <div class="form-group">

                            <label for="description">Categorias*</label>

                            <?php
                                echo $this->Form->control(
                                    'stores_categories_id',
                                    [
                                    'options' => $storesCategories,
                                    'label' => false,
                                    'class' => 'form-control'
                                    ]
                                );
                                ?>

                        </div>

                        <div class="form-group">

                            <label for="description">Subcategoria*</label>

                            <?php
                                echo $this->Form->control(
                                    'stores_subcategories_id',
                                    [
                                    'options' => $storesSubcategories,
                                    'label' => false,
                                    'class' => 'form-control',
                                    'required' => true
                                    ]
                                );
                                ?>

                        </div>

                        <div class="form-group">

                            <label for="description">Categoria Final*</label>

                            <?php
                                echo $this->Form->control(
                                    'stores_finalcategories_id',
                                    [
                                    'options' => $storesFinalcategories,
                                    'label' => false,
                                    'class' => 'form-control',
                                    'required' => true
                                    ]
                                );
                                ?>

                        </div>

                        <div class="form-group">

                            <label for="description">Online</label>

                            <?php
                                echo $this->Form->control(
                                    'online',
                                    [
                                    'label' => false,
                                    ]
                                );
                                ?>

                        </div>

                        <div class="form-group">

                            <label>Peso*</label>
                            <?php echo $this->Form->control(
                                'weight',
                                [
                                    'label' => false,
                                    'class' => 'form-control'
                                ]
                            ); ?>

                        </div>

                    </div>

                    <div class="col-md-6">
<div class="form-group">

    <label> Formato*</label>
    <pre style="background-color: #d7d7d7">
        Como Preencher o Formato:

        Formato da encomenda (incluindo embalagem).

        Valores possíveis: 1, 3
        1 – Formato caixa/pacote
        3 – Envelope
    </pre>
    <?php echo $this->Form->control(
        'package_format',
        [
            'label' => false,
            'class' => 'form-control'
        ]
    ); ?>
</div>

                        <div class="form-group">

                            <label> Comprimento*</label>
                            <?php echo $this->Form->control(
                                'package_lengths',
                                [
                                'label' => false,
                                'class' => 'form-control'
                                ]
                            ); ?>

                        </div>

                        <div class="form-group">

                            <label> Altura*</label>
                            <?php echo $this->Form->control(
                                'package_height',
                                [
                                    'label' => false,
                                    'class' => 'form-control'
                                ]
                            ); ?>

                        </div>

                        <div class="form-group">
                            <label> Largura*</label>
                            <?php echo $this->Form->control(
                                'package_width',
                                [
                                    'label' => false,
                                    'class' => 'form-control'
                                ]
                            ); ?>

                        </div>

                    </div>

                </div>

                <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
