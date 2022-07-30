<div class="col-lg-12 sidebar">

    <br>

    <div class="row">

            <div class="col-md-12">

                <h3>digite seu CPF para que possamos gerar sua nota fiscal</h3>

            </div>

        </div>

        <br>

        <div class="row">

            <div class="col-md-2">

                <form method="post" action="<?= $this->request->base . '/users/setCpfNoDigital' ?>">

                    <input type="text" name="cpf" class="form-control" placeholder="CPF" required>

                    <input
                            type="hidden"
                            class="form-control"
                            name="_csrfToken"
                            value="<?= $this->request->getParam('_csrfToken'); ?>"/>

                    <br>

                    <button type="submit" class="btn btn-primary-outlined btn-default">Enviar e Continuar</button>

                </form>

            </div>

        </div>
        
        <br>

</div>
