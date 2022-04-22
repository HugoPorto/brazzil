<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategorySidebar $categorySidebar
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categorySidebar->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categorySidebar->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Category Sidebars'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="categorySidebars form large-9 medium-8 columns content">
    <?= $this->Form->create($categorySidebar) ?>
    <fieldset>
        <legend><?= __('Edit Category Sidebar') ?></legend>
        <?php
            echo $this->Form->control('category');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
