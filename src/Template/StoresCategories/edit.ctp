<div class="col-md-6" style="padding: 0px">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Nova Categoria</h3>
        </div>

        <?= $this->Form->create($storesCategory) ?>

        <div class="card-body">
            <p><?= $this->Flash->render() ?></p>

            <div class="form-group">

            <label for="category">Categoria</label>

            <?php
                echo $this->Form->control('category', [
                    'label' => false,
                    'class' => 'form-control'
                ]);
                ?>

            </div>


        <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>

        <?= $this->Form->end() ?>

        </div>
    </div>
</div>

