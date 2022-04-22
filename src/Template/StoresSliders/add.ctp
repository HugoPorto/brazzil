<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Banners'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesSliders form large-9 medium-8 columns content">

    <?= $this->Form->create($storesSlider, ['type' => 'file']) ?>
        <fieldset>
            <legend><?= __('Adicionar Banner') ?></legend>

            <label><b>Banner*</b></label>
            <?php
                echo $this->Form->control('slider[]', ['label' => false, 'type' => 'file', 'multiple' => false]);
            ?>

            <label><b>Título</b></label>
            <?php
                echo $this->Form->control('title', ['label' => false]);
            ?>

            <label><b>Subtitulo</b></label>
            <?php
                echo $this->Form->control('subtitle', ['label' => false]);

                echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser, 'class' => 'form-control']);

                echo $this->Form->control('galerys_id', ['type' => 'hidden', 'value' => '12', 'class' => 'form-control']);
            ?>

        </fieldset>

    <?= $this->Form->button(__('Adicionar')) ?>

    <?= $this->Form->end() ?>

</div>
