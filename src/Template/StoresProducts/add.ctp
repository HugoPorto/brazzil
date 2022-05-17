<div class="col-md-12" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Adicionar Novo Produto</h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($storesProduct, ['type' => 'file']) ?>

                <div class="row" style="padding: 0px">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="product">Código de Barras</label>

                            <?php

                                echo $this->Form->control('barcode', [
                                    'label' => false,
                                    'type' => 'text',
                                    'class' => 'form-control'
                                ]);
                                ?>

                        </div>

                        <div class="form-group">

                            <label for="product">QrCode</label>

                            <?php

                                echo $this->Form->control('qrcode', [
                                    'label' => false,
                                    'type' => 'text',
                                    'class' => 'form-control'
                                ]);
                                ?>

                        </div>

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

                            <label for="description">Foto*</label>

                            <?php
                                echo $this->Form->control(
                                    'photo[]',
                                    [
                                    'label' => false,
                                    'required' => true,
                                    'type' => 'file',
                                    'multiple' => false
                                    ]
                                );
                                ?>

                        </div>
                        <div class="form-group">

                            <label for="description">Foto 2*</label>

                            <?php
                                echo $this->Form->control(
                                    'photo2[]',
                                    [
                                    'label' => false,
                                    'required' => true,
                                    'type' => 'file',
                                    'multiple' => false
                                    ]
                                );
                                ?>

                        </div>
                        <div class="form-group">

                            <label for="description">Foto 3*</label>

                            <?php
                                echo $this->Form->control(
                                    'photo3[]',
                                    [
                                    'label' => false,
                                    'required' => true,
                                    'type' => 'file',
                                    'multiple' => false
                                    ]
                                );
                                ?>

                        </div>
                        <div class="form-group">

                            <label for="description">Foto 4*</label>

                            <?php
                                echo $this->Form->control(
                                    'photo4[]',
                                    [
                                    'label' => false,
                                    'required' => true,
                                    'type' => 'file',
                                    'multiple' => false
                                    ]
                                );
                                ?>

                        </div>
                        <div class="form-group">

                            <label for="description">Foto 5*</label>

                            <?php
                                echo $this->Form->control(
                                    'photo5[]',
                                    [
                                    'label' => false,
                                    'required' => true,
                                    'type' => 'file',
                                    'multiple' => false
                                    ]
                                );
                                ?>

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

                            <label for="description">Quantidade*</label>

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

                <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
