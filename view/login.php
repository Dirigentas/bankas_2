<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <div class="card m-4">
                <div class="card-header" style="text-align: center">
                    Prisijungti prie Bankas-2
                </div>
                <div class="card-body">
                    <form action="<?= URL ?>tryhome" method="post">
                        <div class="mb-3">
                            <label class="form-label">Naudotojas</label>
                            <input type="text" name="name" class="form-control" placeholder="naudotojas">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slaptažodis</label>
                            <input type="password" name="psw" class="form-control" placeholder="slaptažodis">
                            <button type="submit" class="btn btn-outline-info mt-4">Prisijungti</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if ($state == 'error') : ?>
            <h6 class="alert alert-danger" role="alert">Prisijungimo vardas arba slaptažodis yra neteisingas</h6>
        <?php endif ?>
    </div>
</div>