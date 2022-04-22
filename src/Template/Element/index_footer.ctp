<?php if($role === 'common'):?>

    <footer class="main-footer" v-if="structure_page.page_footer">
        Focux Systems; 2021-2022
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
        </div>
    </footer>

<?php elseif($role === 'boards'):?>

    <footer class="main-footer" v-if="structure_page.page_footer">
        Focux Boards; 2021-2022
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
        </div>
    </footer>

<?php elseif($role === 'storeAdmin'):?>

    <footer class="main-footer" v-if="structure_page.page_footer">
        OHNIK; 2021-2022
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
        </div>
    </footer>

<?php endif;?>

</div>
