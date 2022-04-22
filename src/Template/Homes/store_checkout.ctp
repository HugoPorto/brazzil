<?php $this->layout = false; ?>

<?php echo $this->element('store_head'); ?>

<body id="body" class="">

<?php echo $this->element('store_header'); ?>

<div class="main-wrapper home_transparent-wrapper @@active  checkout">


<div class="container checkout-details">
	<h3>Pagamento</h3>
	<div class="row">
		<div class="col-12">
			<div class="billing text_input">
				<div class="billing-information">

                    <?php echo $this->element('store_checkout_form'); ?>

				</div>
			</div>
		</div>
	</div>
	<div class="confirmation">
		<h3>Compras</h3>

        <?php foreach ($storesCarts as $storesCart): ?>
            <div class="order-single">
                <div class="row">
                    <div class="col-md-8">
                        <div class="cart_img">
                            <img width="114px" height="114px" src="<?= $storesCart->stores_product->photo ?>" alt="cart">
                        </div>
                        <div class="cart_product-title">
                            <h5><?= $storesCart->stores_product->product ?></h5>
                            <span>Quantidade: <?= $storesCart->quantity ?></span>
                        </div>
                    </div>
                    <div class="col-md-4 price">
                        <span class="">R$<?= ($storesCart->stores_product->price * $storesCart->quantity) ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
	</div>
	<div class="confirm-total">
		<div class="row">
			<div class="col-md-6 text-left">
				<h6>Total: </h6><span class="text-primary"> R$<?= $total ?></span>
			</div>
		</div>
	</div>

</div>

<?php echo $this->element('store_contact'); ?>

<?php echo $this->element('store_footer'); ?>

