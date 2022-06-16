<?php $this->layout = false; ?>

<?php echo $this->element('store_head'); ?>

<body id="body" class="">

<?php echo $this->element('store_header'); ?>

<div class="main-wrapper home_transparent-wrapper @@active  cart">
    <div class="bredcrumb bg-info text-center">
        <div class="row">
            <div class="col-sm-12">
                <h2>Carrinho</h2>
                <ul class="">
                    <li><a href="<?= $this->request->base ?>" class="bread_link">Home</a></li>
                    <li>Carrinho</li>
                </ul>
            </div>
        </div>
    </div>
<section class="single_item" style="padding-top: 50px !important;">
    <div class="container">  
        <div class="row order-container">
            <div class="col-lg-6">
                <h3 class="bg-sand">Selecionar Endereço e Calcular Frete</h3>

                <div class="order-single" style="padding: 20px">
                    <form method="post" accept-charset="utf-8" action="<?= $this->request->base ?>/stores-address/addSession">
                        <div class="form-group row">

                            <label for="example-text-input" class="col-md-2 col-form-label">Endereço*</label>

                            <div class="col-md-10">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="address"
                                    placeholder="Endereço"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="example-search-input" class="col-md-2 col-form-label">Bairro*</label>

                            <div class="col-md-10">
                                <input
                                    class="form-control"
                                    name="district"
                                    type="text"
                                    placeholder="Bairro"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="example-search-input" class="col-md-2 col-form-label">Cidade*</label>

                            <div class="col-md-10">
                                <input
                                    class="form-control"
                                    name="city"
                                    type="text"
                                    placeholder="Cidade"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="example-search-input" class="col-md-2 col-form-label">Número*</label>

                            <div class="col-md-10">
                                <input
                                    class="form-control"
                                    name="number"
                                    type="text"
                                    placeholder="Número"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="example-search-input" class="col-md-2 col-form-label">Ponto de Referênia*</label>

                            <div class="col-md-10">
                                <input
                                    class="form-control"
                                    name="reference"
                                    type="text"
                                    placeholder="Ponto de Referênia"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="example-search-input" class="col-md-2 col-form-label">CEP*</label>

                            <div class="col-md-10">
                                <input
                                    class="form-control"
                                    name="cep"
                                    type="text"
                                    value="<?= $cep ? $cep : '' ?>"
                                    placeholder="CEP"
                                    required>

                                <input
                                    type="hidden"
                                    class="form-control"
                                    name="_csrfToken"
                                    value="<?= $this->request->getParam('_csrfToken'); ?>"/>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-default card-btn">Selecionar Endereço</button>
                    </form>
                </div>
            </div>

            <?php echo $this->element('store_cart_cart'); ?>

        </div>
    </div>
</section>

<?php echo $this->element('store_contact'); ?>

<?php echo $this->element('store_footer'); ?>

