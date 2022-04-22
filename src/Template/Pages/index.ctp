<div class="row">
    <div class="col-lg-6">

        <?php // echo $this->element('store_chart_visitors'); ?>
        <?php // echo $this->element('store_chart_products'); ?>

    </div>

    <div class="col-lg-6">

        <?php // echo $this->element('store_chart_sales'); ?>
        <?php // echo $this->element('store_chart_overview'); ?>

    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Usuários</h3>
    </div>
    <div class="card-body">
        <table id="general" class="table table-bordered table-striped" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><strong><?= h($user->name) ?></strong></td>
                    <td><?= h($user->lastname) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->cellphone) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
