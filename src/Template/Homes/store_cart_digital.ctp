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

                <?php echo $this->element('store_digital_cart'); ?>

            </div>
        </div>
    </section>

<?php echo $this->element('store_contact'); ?>

<?php echo $this->element('store_footer'); ?>

