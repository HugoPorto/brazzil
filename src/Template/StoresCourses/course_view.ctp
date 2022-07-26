
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresCourse $storesCourse
 */
?>
<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?= $videosCourseCount ?></h3>
        <p>Total de Aulas</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3>% <?= number_format((float) $percentVieweds, 2) ?></h3>
        <p>Percentual Concluído</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?= $videosViewedsCount ?></h3>

        <p>Aulas Vistas</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
  </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="btn-group">
                <?= $this->Html->link(__('Aulas'), ['action' => 'videos', $storesCourse->id], ['class' => 'btn btn-info']) ?>
            </div>
            <div class="btn-group">
                <?= $this->Html->link(__('Slides'), ['action' => 'slide', $storesCourse->id], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <div class="margin">
          <div class="row">
            <div class="col-md-6">
              <table class="vertical-table table table-borderless table_view">
                  <tr>
                      <th scope="row" style="background-color: #F2F5F7;"><?= __('Curso') ?></th>
                      <td><?= h($storesCourse->course) ?></td>
                  </tr>
                  <tr>
                      <th scope="row" style="background-color: #F2F5F7;"><?= __('Autor') ?></th>
                      <td><?= h($storesCourse->autor) ?></td>
                  </tr>
                  <tr>
                      <th scope="row" style="background-color: #F2F5F7;"><?= __('Tema') ?></th>
                      <td><?= h($storesCourse->theme) ?></td>
                  </tr>
                  <tr>
                      <th scope="row" style="background-color: #F2F5F7;"><?= __('Foto') ?></th>
                      <td>
                          <img class="image-table-course" <?= $storesCourse->photo ?> />
                      </td>
                  </tr>
                  <tr>
                      <th scope="row" style="background-color: #F2F5F7;"><?= __('Criado Em') ?></th>
                      <td><?= h($storesCourse->created) ?></td>
                  </tr>
                  <tr>
                      <th scope="row" style="background-color: #F2F5F7;"><?= __('Última Modificação') ?></th>
                      <td><?= h($storesCourse->modified) ?></td>
                  </tr>
              </table>
            </div>
            <div class="col-md-6">
              <h3>Ementa</h3>
              <ul class="list-group list-group-flush">
                <?php foreach ($menus as $menu) : ?>
                  <li class="list-group-item"><?= $menu->menu ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
    </div>
</div>