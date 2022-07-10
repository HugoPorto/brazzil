<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCategory $storesCategory
 */
?>
<div class="col-md-12 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Adicionar Nova Empresa</h3>
        </div>
     
        <div class="card-body">

            <?= $this->Form->create($company, ['type' => 'file']) ?>

                <div class="row" style="padding: 0px">

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                                echo $this->Form->control('company', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'placeholder' => 'Empresa*'
                                ]);
                                ?>

                        </div>

                        <div class="form-group">

                            <label for="photo">Logotipo*</label>

                            <?php
                                echo $this->Form->control('photo[]', [
                                    'label' => false,
                                    'type' => 'file',
                                    'multiple' => false,
                                    'required' => true
                                ]);
                                ?>

                        </div>

                        <div class="form-group">

                            <?php
                                echo $this->Form->control('email', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'type' => 'email',
                                    'placeholder' => 'E-mail*'
                                ]);
                                ?>

                        </div>

                        <div class="form-group">

                            <?php
                                echo $this->Form->control('phone', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'placeholder' => 'Telefone*',
                                ]);
                                ?>

                        </div>

                        <div class="form-group">

                            <?php
                                echo $this->Form->control('fiscal_number', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'placeholder' => 'Número Fiscal*',
                                ]);
                                ?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">

                            <?php
                                echo $this->Form->control('address', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'placeholder' => 'Endereço*',
                                ]);
                                ?>

                        </div>                        

                        <div class="form-group">

                            <?php
                                echo $this->Form->control('cep', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'placeholder' => 'CEP*',
                                ]);
                                ?>

                        </div>

                        <div class="form-group">
                            <label for="stores-products-id">Cidade*</label>

                            <select name="citys_id" onchange="verifyState()" class="form-control select2bs4" style="width: 100%;" id="stores-products-id">
                                <?php foreach ($citys as $city) : ?>
                                    <option value="<?= $city->id ?>">
                                        <?= $city->name ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                        </div>

                        <div class="form-group" id="state"></div>
                        <?php echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser ]);?>
                    </div>
                </div>

            <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>
    
            <?= $this->Form->end() ?>            

        </div>
    </div>
</div>

