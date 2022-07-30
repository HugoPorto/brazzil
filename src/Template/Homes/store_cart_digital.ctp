<?php

$this->layout = false; ?>

<?= $this->element('store_head') ?>

<body id="body" class="">

<?= $this->element('store_header') ?>

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

    <section class="single_item single-item-cart">

        <div class="container">  

            <div class="row order-container">

                <?= $this->element('store_digital_cart') ?>

            </div>

        </div>

    </section>

<?= $this->element('store_contact') ?>

<?= $this->element('store_footer') ?>

