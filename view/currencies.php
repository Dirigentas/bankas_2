
<!-- <div style="display:flex; justify-content: space-between; flex-direction: column; gap: 10px; border: solid 3px skyblue"> -->
<h4 style="margin-top: 100px; width 20%; margin-left: 30%; margin-right: 30%; margin top 100 px; padding: 50px; display:flex; justify-content: space-between; border-bottom: dashed 2px skyblue; flex-wrap: wrap; gap: 5px; padding: 3px">Valiuta<span style = "margin-left:100px">Valiutos kursas už 1 eur</span></h4>
<?php foreach ($currencies['rates'] as $key => $currency) : ?>
        <h6 style="margin-top: 30px; width 20%; margin-left: 30%; margin-right: 30%; margin top 100 px; padding: 50px; display:flex; justify-content: space-between; border-bottom: dashed 2px skyblue; flex-wrap: wrap; gap: 5px; padding: 3px">
            <div><?= $key ?> <span style = "margin-left:350px"> <?=$currency?></span></div>
        </h6>
    <?php endforeach ?>

