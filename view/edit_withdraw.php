<div class=" container" style='padding-top:100px; text-align:center'>
    <div class="row" style=" border: solid 3px skyblue">
        <div class="col">
            Vardas: <?= $iban['vardas'] ?>
        </div>
        <div class="col">
            Pavardė: <?= $iban['pavarde'] ?>
        </div>
        <div class="col">
            Sąskaitos likutis: <?= number_format($iban['likutis'], 2, ',', ' ') ?> eur
        </div>
    </div>
</div>

<div class="container row justify-content-center" style="margin-top: 100px;">
    <form action="<?= URL ?>iban_list/update/withdraw/<?= $iban['ID'] ?>" method="post" class="m-4 col-12 col-sm-8 col-md-6">
        <div class="mb-3">
            <label class="form-label">Suma, eur</label>
            <input type="text" name="pokytis" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Nusiimti lėšas</button>
    </form>
</div>