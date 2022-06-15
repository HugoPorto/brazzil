<div class="col-md-12" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Adicionar Novo Produto</h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($storesProduct, ['type' => 'file']) ?>

                <div class="row" style="padding: 0px">

                    <div class="col-md-6">

                        <div class="row">
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
                            </div>
                            <div class="col-md-6">
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
                            </div>
                        </div>

                        <div class="row">
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                <label for="description">Descrição*</label>

                                    <?php
                                        echo $this->Form->control('description', [
                                            'label' => false,
                                            'class' => 'form-control',
                                            'type' => ''
                                        ]);
                                        ?>

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                <label for="description">Categorias*</label>

                                <?php
                                    echo $this->Form->control(
                                        'stores_categories_id',
                                        [
                                        'options' => $storesCategories,
                                        'label' => false,
                                        'class' => 'form-control',
                                        'onchange' => "verifySubcategory()",
                                        'id' => 'category'
                                        ]
                                    );
                                    ?>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6" id="subcategory"></div>
                            <div class="col-md-6" id="finalcategory"></div>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">                        
                                    <label style="font-size: 13px"> Formato* | 1 – Formato caixa/pacote | 3 – Envelope</label>
                                    <?php echo $this->Form->control(
                                        'package_format',
                                        [
                                            'label' => false,
                                            'class' => 'form-control'
                                        ]
                                    ); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
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

                        <div class="row">
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
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
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
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
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">

                        <label for="description">Foto 2</label>

                        <?php
                            echo $this->Form->control(
                                'photo2[]',
                                [
                                'label' => false,
                                'type' => 'file',
                                'multiple' => false
                                ]
                            );
                            ?>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                        <label for="description">Foto 3</label>

                        <?php
                            echo $this->Form->control(
                                'photo3[]',
                                [
                                'label' => false,
                                'type' => 'file',
                                'multiple' => false
                                ]
                            );
                            ?>

                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">

                        <label for="description">Foto 4</label>

                        <?php
                            echo $this->Form->control(
                                'photo4[]',
                                [
                                'label' => false,
                                'type' => 'file',
                                'multiple' => false
                                ]
                            );
                            ?>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                        <label for="description">Foto 5</label>

                        <?php
                            echo $this->Form->control(
                                'photo5[]',
                                [
                                'label' => false,
                                'type' => 'file',
                                'multiple' => false
                                ]
                            );
                            ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Aplicar Gradiente Vertical</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                        <label class="custom-control-label" for="customSwitch2">Aplicar Gradiente Vertical de 2 Cores</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group" id="color_select">
                            <label for="color">Cor*</label>

                            <?php
                                echo $this->Form->control(
                                    'color',
                                    [
                                    'label' => false,
                                    'type' => 'color',
                                    ]
                                );
                                ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
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
                    </div>
                </div>

                <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
