<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active pb-0" id="home" role="tabpanel" aria-labelledby="home-tab">
        <form method="post" action="<?= $this->request->base ?>/stores-cards/add">
            <div class="form-group row">
                <label for="example-text-input" class="col-md-2 col-form-label">Nome no cartão</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="name" placeholder="Nome no Cartão" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-search-input" class="col-md-2 col-form-label">Número do cartão</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="number" placeholder="#### . #### . ####" required>
                </div>
            </div>

            <div class="form-group custom-form-group-icon row">
                <label for="example-datetime-local-input" class="col-md-2 col-form-label">Data de expiração</label>
                <div class="col-md-10">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                    <input type="text" class="form-control" name="date_expires" value="" placeholder="00/00" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-password-input" class="col-md-2 col-form-label">Código de segurança</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="security_code" placeholder="CVC" required>
                    <i class="fa fa-question-circle helpText" aria-hidden="true"></i>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-postal-code" class="col-md-2 col-form-label">Código postal</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="postal_code" placeholder="Código postal" required>
                </div>
            </div>

            <input
                type="hidden"
                class="form-control"
                name="users_id"
                value="<?= $idUser ?>"/>

            <div class="form-group">
                <div class="row align-items-center">
                    <div class="col-md-12 mb-3">
                        <div class="text-md-left">
                            <button class="btn btn-primary btn-default card-btn" type="submit">Pagar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
