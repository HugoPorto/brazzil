<?php $this->layout = false; ?>

<?php echo $this->element('store_head'); ?>

<body id="body" class="">

<?php echo $this->element('store_bottombar'); ?>

<?php echo $this->element('store_header'); ?>

<div class="main-wrapper home_transparent-wrapper @@active  contactus">

<section class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 mb-4 mb-md-0">
                <h3><?= $this->Flash->render() ?> </h3>
                <form method="post" action="<?= $this->request->base ?>/storesBudgets/add">
                    <h2>Orçamento</h2>
                    <div class="row">
                        <div class="form-group col-lg-6">
                          <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="Nome*" required>
                        </div>
                        <div class="form-group col-lg-6">
                          <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="E-mail*" required>
                        </div>
                        <div class="form-group col-md-12">
                           <textarea class="form-control" id="exampleTextarea" name="budget" rows="5" placeholder="Orçamento*" required></textarea>
                        </div>
                        <input
                            type="hidden"
                            class="form-control"
                            name="_csrfToken"
                            value="<?= $this->request->getParam('_csrfToken'); ?>"/>
                    </div>
                    <button type="submit" class="btn btn-default btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php echo $this->element('store_contact'); ?>

<?php echo $this->element('store_footer'); ?>
