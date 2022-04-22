<section class="content">
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-body">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <legend><?= __('Edit Password') ?></legend>
                    <?php
                        echo $this->Form->control('password', ['class' => 'form-control', "value" => ""]);
                        echo '<br>';
                        echo $this->Form->control('confirm_password', ['type' => 'password', 'class' => 'form-control']);
                        echo '<br>';
                        echo $this->Form->control('roles_id', ['type' => 'hidden', 'value' => 3]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-danger btn-block btn-flat']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
</section>