<?php echo $this->element('index_head'); ?>

<?php echo $this->element('index_nav'); ?>

<?php echo $this->element('index_mainsidebar'); ?>

<?php echo $this->element('index_content_header'); ?>

<?php echo $this->element('index_content_above'); ?>

    <?= $this->fetch('content') ?>

<?php echo $this->element('index_content_under'); ?>

<?php echo $this->element('index_aside'); ?>

<?php echo $this->element('index_footer'); ?>

<?php echo $this->element('index_scripts');
