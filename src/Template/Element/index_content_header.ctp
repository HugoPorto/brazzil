<?php //$this->Flash->render() ?>

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">

            <?php if ($username) :?>
                <?php if ($role == 'common') :?>
                    <!-- <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{structure_page.breadcumb}}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a :href="structure_page.main_link">{{structure_page.home}}</a></li>
                                <li class="breadcrumb-item active">{{structure_page.breadcumb}}</li>
                            </ol>
                        </div>
                    </div> -->

                <?php endif;?>

            <?php endif;?>

        </div>
    </div>
