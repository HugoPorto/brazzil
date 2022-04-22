<?php
$this->layout = false;
$cakeDescription = 'focux';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
      <?= $title.': '.$subtitle ?>
    </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?= $this->Html->css(
    [
    '/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css',
    '/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css',
    '/AdminLTE/bower_components/Ionicons/css/ionicons.min.css',
    '/AdminLTE/dist/css/AdminLTE.min.css',
    '/AdminLTE/plugins/iCheck/square/blue.css',
    ]);
  ?>

  <?= $this->element('favicon'); ?>

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/viewx">Cadastro de Usuário</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Cadastrar um Novo Usuário</p>

     <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->control('name', ['class' => 'form-control', 'Placeholder' => 'Nome', 'label' => false]);
            echo $this->Form->control('lastname', ['class' => 'form-control', 'Placeholder' => 'Sobrenome', 'label' => false]);
            echo $this->Form->control('username', ['class' => 'form-control', 'Placeholder' => 'Login', 'label' => false]);
            echo $this->Form->control('email', ['class' => 'form-control', 'Placeholder' => 'Email', 'label' => false]);
            echo $this->Form->control('cellphone', ['class' => 'form-control', 'Placeholder' => 'Celular', 'label' => false]);
            echo $this->Form->control('password', ['class' => 'form-control', 'Placeholder' => 'Senha', 'label' => false]);
            echo $this->Form->control('confirm_password', ['type' => 'password', 'class' => 'form-control', 'Placeholder' => 'Confirma sua senha', 'label' => false]);
            echo $this->Form->control('roles_id', ['type' => 'hidden', 'value' => 3]);
        ?>
    </fieldset>
    <br>
      By registering, you accept our
    <a href="/xporn/abouts/view/3" class="text-center" target="_blank">terms</a>.
    <br>
    <br>
    <?= $this->Form->button(__('Register'), ['class' => 'btn btn-danger btn-block btn-flat']) ?>
    <br>
    <?= $this->Form->end() ?>
    <!-- 
      <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
      </div> 
    -->
    <a href="/viewx/users/login" class="text-center" target="_blank">I already have a membership</a>
  </div>
</div>
<?php
    echo $this->Html->script(
    [
        '/AdminLTE/bower_components/jquery/dist/jquery.min.js',
        '/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js',
        '/AdminLTE/plugins/iCheck/icheck.min.js',
    ]);
?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' //optional
    });
  });
</script>
</body>
</html>
