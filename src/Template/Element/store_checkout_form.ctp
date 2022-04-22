<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active pb-0" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="form-group">
            <div class="row align-items-center">
                <div class="col-md-12 mb-3">

                    <div class="text-md-left">

                        <?= $this->Html->link(__('Pagar'),
                        ['controller' => 'Stripes', 'action' => 'stripe'],
                        ['class' => 'btn btn-primary btn-default card-btn']) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
