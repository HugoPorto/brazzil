<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-body">
            <?php if ($error) : ?>
                <span style="color: red !important"><?= $this->Flash->render() ?></span>

            <?php endif;?>

            <?= $this->Form->create($imageProfile, ['type' => 'file']) ?>
            <div class="form-group">
                <label for="exampleInputFile">Atualizar imagem de perfil</label>
                <div class="input-group">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image[]" multiple="false">

                    <?php
                        echo $this->Form->control('galerys_id', ['type' => 'hidden', 'value' => '11', 'class' => 'form-control']);
                        echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $user->id, 'class' => 'form-control']);
                    ?>
                    <label class="custom-file-label" for="exampleInputFile">Escolher arquivo</label>
                    </div>
                    <div class="input-group-append">
                        <button class="input-group-text" type="submit">Atualizar</button>
                    </div>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
