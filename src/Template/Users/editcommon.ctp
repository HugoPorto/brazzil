<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>

        <?= $this->Form->create(
            $user,
            [
                'url' =>
                    [
                        'action' => 'editcommon'
                    ],
                'class' => 'form-horizontal'
            ]
        )
        ?>

        <div class="card-body">

            <div class="form-group">

                <?php
                    echo $this->Form->control('name', ['class' => 'form-control']);
                ?>

            </div>

            <div class="form-group">

                <?php
                    echo $this->Form->control('email', ['class' => 'form-control']);
                ?>

            </div>

            <div class="form-group">

                <label for="coin-quote-on-the-day">Phone</label>

                <?php
                    echo $this->Form->control(
                        'cellphone',
                        [
                            'class' => 'form-control',
                            'label' => false
                        ]
                    );
                    ?>

            </div>

            <div class="form-group">

                <?php
                    echo $this->Form->control('roles_id', ['type' => 'hidden', 'value' => 3]);
                ?>

            </div>

            <?= $this->Form->button(__('Edit'), ['class' => 'btn btn-info']) ?>

            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
