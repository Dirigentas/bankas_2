<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <div class="card m-4">
                <div class="card-header" style="text-align: center">
                    Login to Bankas-2
                </div>
                <div class="card-body">
                    <form action="<?= URL ?>home" method="post">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="psw" class="form-control" placeholder="password">
                            <button type="submit" class="btn btn-outline-info mt-4">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <?php// if (isset($result)) : ?>
            <h6 class="alert alert-danger" role="alert"> <?= $result ?> </h6>
        <?php // endif ?> -->
    </div>
</div>