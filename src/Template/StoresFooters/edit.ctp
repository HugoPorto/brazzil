<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Rodapé</h3>
        </div>

        <?= $this->Form->create($storesFooter) ?>

        <div class="card-body">
            <p><?= $this->Flash->render() ?></p>

            <div class="form-group">

                <label>Rodapé</label>
                <?php
                    echo $this->Form->control('footer', [
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

