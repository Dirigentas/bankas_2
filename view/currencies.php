<div class="container-sm py-5 px-5" style="text-align:center">
    <div>
        <div style="display:flex; justify-content: space-between; flex-direction: column; gap: 10px; border: solid 3px skyblue">
            <h4 style="display:flex; justify-content: space-evenly; border-bottom: dashed 2px skyblue; flex-wrap: wrap; gap: 5px; padding: 3px" style = "margin-left: 20px"><span></span><span></span>Valiuta<span></span><span>Valiutos kursas už 1 eur</span><span></span></h4>

            <?php foreach ($currencies['rates'] as $key => $currency) : ?>
                <h6 style="display:flex; justify-content: space-evenly; border-bottom: dashed 2px skyblue; flex-wrap: wrap; gap: 5px; padding: 3px">
                    <div class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1"><?= $key ?></div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-2 col-xl-1"><?= $currency ?></div>
                </h6>
            <?php endforeach ?>
        </div>
    </div>
</div>

