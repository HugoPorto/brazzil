<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <h3>R$ <?= number_format((float) $boxValue[0]->sum, 2) ?></h3>

        <p>Montantes dos Pedidos</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="<?= $this->request->base . '/stores-demands' ?>" class="small-box-footer">Maiores informações <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= $companysCount ?></h3>

        <p>Empresas Registradas</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="<?= $this->request->base . '/companys' ?>" class="small-box-footer">Maiores informações <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?= $usersCount ?></h3>

        <p>Usuários Registrados</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="<?= $this->request->base . '/pages' ?>" class="small-box-footer">Maiores informações <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?= $productsCount ?></h3>
        <p>Produtos Registrados</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="<?= $this->request->base . '/stores-products' ?>" class="small-box-footer">Maiores informações <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>