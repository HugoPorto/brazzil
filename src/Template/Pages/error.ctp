<section class="content">
    <div class="error-page">
        <h2 class="headline text-danger">Erro</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! <?= $message ?>.</h3>

            <p>
            Nós vamos trabalhar para corrigir esse erro.
            Por enquanto, você deve <a href="<?= $this->request->base . '/admin' ?>">retornar para o dashboard</a>, ou entrar em contato com um administrador.
            </p>

            <!-- <form class="search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search">

                <div class="input-group-append">
                <button type="submit" name="submit" class="btn btn-danger"><i class="fas fa-search"></i>
                </button>
                </div>
            </div>
            </form> -->
        </div>
    </div>
</section>
