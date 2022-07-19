<div class="content">
<div class="container-fluid">

<?php if (($this->request->controller !== 'StoresCourses') && ($this->request->controller !== 'StoresVideos') && ($this->request->controller !== 'Certificates')) :?>
    <?php echo $this->element('index_statistics'); ?>
<?php endif;?>
