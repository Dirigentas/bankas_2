<div class="container-sm py-5 px-5" style="text-align:center">
    <div>
        <div style="display:flex; justify-content: space-between; flex-direction: column; gap: 10px; border: solid 3px skyblue">
            <?php foreach ($ibans as $iban) : ?>
                <h6 style="display:flex; justify-content: space-between; border-bottom: dashed 2px skyblue; flex-wrap: wrap; gap: 5px; padding: 3px">
                    <div class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1"><?= $iban['asmens_kodas'] ?></div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1"><?= $iban['pavarde'] ?></div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-3 col-xl-3"><?= $iban['IBAN'] ?></div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1"><?= number_format($iban['likutis'], 2, ',', ' ') ?></div>
                    <a class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1" href="http://bankas_2.lt/iban_list/edit_add/<?= $iban['ID'] ?>">Pridėti lėšų</a>
                    <a class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1" href="http://bankas_2.lt/iban_list/edit_withdraw/<?= $iban['ID'] ?>">Nuskaičiuoti lėšas</a>
                    <form class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1" action="http://bankas_2.lt/iban_list/delete/<?= $iban['ID'] ?>" method="post">
                        <input hidden name="ID" iban="<?= $iban['ID'] ?>">
                        <button type="submit" class="btn btn-success">Ištrinti</button>
                    </form>
                </h6>
            <?php endforeach ?>
        </div>
    </div>
</div>