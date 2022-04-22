<div class="row">

    <div class="col-md-8">

        <div class="card card-info card-outline">

            <div class="card-body box-profile">

                <?php if ($username) :?>
                    <?php if ($role == 'storeAdmin') :?>
                        <?php echo $this->Html->link(
                            __('Editar Usuário'),
                            [
                                'action' => 'editcommon'
                            ]
                        );
                        ?>

                    <?php endif; ?>

                <?php endif; ?>

                <div class="text-center">

                    <?php if ($imageProfileFront != null) :?>
                        <a href="<?= $this->request->base ?>/users/updatePhoto">

                            <?php


                                echo $this->Html->image(
                                    'galerys/' . $imageProfileFront->galerys_id . '/' . $imageProfileFront->image,
                                    [
                                        'class' => 'profile-user-img img-fluid img-circle',
                                        'alt' => 'User profile picture'
                                    ]
                                );

                            ?>

                        </a>

                    <?php else :?>
                        <a href="<?= $this->request->base ?>/users/updatePhoto">
                            <img class="profile-user-img img-fluid img-circle"
                                src="<?php echo $this->request->webroot . 'img/ccfca13e-5ba9-4d3d-8904-717e952b24ac.jpg';?>"
                                alt="User profile picture">
                        </a>

                    <?php endif;?>

                </div>

                <h3 class="profile-username text-center"><?= $_user['name'] ?></h3>

                <p class="text-muted text-center"><?= $_user['email'] ?></p>

                <ul class="list-group list-group-unbordered mb-3">

                    <li class="list-group-item">

                        <b>Telefone</b>

                        <?php if ($_user['cellphone'] !== "") :?>
                            <a class="float-right"><?= $_user['cellphone'] ?></a>

                        <?php else :?>
                            <a class="float-right">Não Informado</a>

                        <?php endif;?>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
