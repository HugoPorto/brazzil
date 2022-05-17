<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <?php if ($imageProfileFront != null) :?>
            <?php if (sizeof($imageProfileFront->toArray()) !== 0) :?>
                <?php
                    echo $this->Html->image(
                        'galerys/' . $imageProfileFront->galerys_id . '/' . $imageProfileFront->image,
                        [
                            'class' => 'img-circle elevation-2',
                            'alt' => 'User Image'
                        ]
                    );
                ?>
            <?php else :?>
                <img src="<?php echo $this->request->webroot . 'img/ccfca13e-5ba9-4d3d-8904-717e952b24ac.jpg';?>"
                    class="img-circle elevation-2"
                    alt="User Image">

            <?php endif;?>
        <?php else :?>
            <img src="<?php echo $this->request->webroot . 'img/ccfca13e-5ba9-4d3d-8904-717e952b24ac.jpg';?>"
                class="img-circle elevation-2"
                alt="User Image">

        <?php endif;?>
    </div>
    <div class="info username" id="<?= $idUser ?>">
            <?php if ($username) :?>
                <?php if ($role == 'storeAdmin') :?>
                    <?= $this->Html->link(
                        $username,
                        [
                            'controller' => 'users',
                            'action' => 'profile'
                        ],
                        [
                            'class' => 'd-block'
                        ]
                    )
                    ?>

                <?php endif; ?>

            <?php else :?>
                    <?= $this->Html->link(
                        __('Register/Login'),
                        [
                        'controller' => 'users',
                        'action' => 'login'
                        ]
                    )
                    ?>

            <?php endif; ?>
    </div>
</div>
