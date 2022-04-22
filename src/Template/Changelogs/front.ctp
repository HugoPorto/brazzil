<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>changelog</th>
                    <th>created</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($changelogs as $changelog): ?>
                <tr>
                    <td><?= h($changelog->changelog) ?></td>
                    <td><?= h($changelog->created) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>changelog</th>
                    <th>created</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
