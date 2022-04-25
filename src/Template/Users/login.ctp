<?php $this->layout = false; ?>

<?php echo $this->element('store_head'); ?>

<body id="body" class="">

<?php echo $this->element('store_header'); ?>

<div class="main-wrapper home_transparent-wrapper @@active  signup">

<div class="container ">
    <div class="row register-form">
        <div class="col-md-6 mb-5 mb-md-0">
            <h3 class="form_title">Login </h3>
            <form  class="register" method="post" action="<?=$this->request->base?>/users/login">

                <div class="row">
                    <div class="form-group col-md-12 email">
                      <input type="text" name="username" class="form-control" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group col-md-12 password">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                      <input
                        type="hidden"
                        class="form-control"
                        name="_csrfToken"
                        value="<?= $this->request->getParam('_csrfToken'); ?>"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-default btn-primary btn-block mt-4">Log In</button>

            </form>
        </div>
        <div class="col-md-6">
            <h3 class="form_title">Cadastro</h3>
            <form  class="register" action="<?= $this->request->base ?>/users/register" method="post">
                <div class="row">
                    <div class="form-group col-md-12 uname">
                      <input type="text" class="form-control" id="uname" aria-describedby="fullName" placeholder="Name" name="name">
                    </div>
                    <div class="form-group col-md-12 uname">
                      <input type="text" class="form-control" id="uname" aria-describedby="fullName" placeholder="Lastname" name="lastname">
                    </div>
                    <div class="form-group col-md-12 uname">
                      <input type="text" class="form-control" id="uname" aria-describedby="fullName" placeholder="Username" name="username">
                    </div>
                    <div class="form-group col-md-12 email">
                      <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" name="email">
                    </div>
                    <div class="form-group col-md-12 password">
                      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-group col-md-12 password">
                      <input type="password" class="form-control" id="password" placeholder="Confirm Password" name="confirm_password">
                      <input
                        type="hidden"
                        class="form-control"
                        name="_csrfToken"
                        value="<?= $this->request->getParam('_csrfToken'); ?>"/>
                    </div>
                    <input type="hidden" name="roles_id" value="11">
                    <div class="form-check col-md-12">
                        <input id="checkbox-3" class="checkbox-custom form-check-input" name="checkbox-3" type="checkbox">
                        <label for="checkbox-3" class="checkbox-custom-label form-check-label ">Eu concordo com os <a href="" class="text-primary">termons e condições</a> </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-default btn-primary btn-block mt-4">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

<style media="screen">
    .register-form {
        padding-top: 80px;
        padding-bottom: 40px;
    }
  @media (min-width: 992px) {
    .register-form {
            padding-top: 100px;
            padding-bottom: 100px;
        }
    }
</style>

<?php echo $this->element('store_contact'); ?>

<?php echo $this->element('store_footer'); ?>
