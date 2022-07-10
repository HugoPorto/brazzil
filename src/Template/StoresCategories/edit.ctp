<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Nova Categoria</h3>
        </div>

        <?= $this->Form->create($storesCategory) ?>

        <div class="card-body">
            <div class="form-group">

                <label for="category">Categoria</label>

                <?php
                    echo $this->Form->control('category', [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'category'
                    ]);
                    ?>

            </div>

            <div class="form-group">

                <label for="status_menu">Status Menu</label>

                <?php
                    echo $this->Form->control('status_menu', [
                        'label' => false,
                        'id' => 'status_menu'
                    ]);
                    ?>

            </div>


        <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>

        <?= $this->Form->end() ?>

        </div>
    </div>
</div>

