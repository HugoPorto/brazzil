    <footer class="footer bg-footer">
        <div class="container" style="padding-top: 50px;">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <ul class="list-inline socialLink text-center">
                        <li class="list-inline-item"><a href="" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li class="list-inline-item"><a href="" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-6 offset-md-3">
                    <div class="copyRight_text text-center">
                        <p><?= $storesFooters->footer; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php echo $this->element('store_whatsapp'); ?>

<?php echo $this->element('store_scripts'); ?>

</body>

</html>
