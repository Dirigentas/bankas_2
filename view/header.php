<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL . 'style.css' ?>">
    <title> <?= $pageTitle ?></title>
</head>
<body>
    <body>
    <nav class="navbar navbar-expand-sm" style="background-color: deepskyblue; font-weight: bold">
        <div class="container-fluid">
            <div class="navbar-nav" style="display:flex; gap: 10%; width: 100%; justify-content:space-around">
                <!-- <div style="color: #fff">Logged in as <br><?= $_SESSION['user']['name'] ?></div> -->
                <a class="nav-link <?= $pageTitle == 'Sąskaitų Sąrašas' ? 'active' : '' ?> " aria-current="page" href="http://bankas_2.lt/iban_list">Sąskaitų sąrašas</a>
                <a class="nav-link <?= $pageTitle == 'Sukurti naują sąskaitą' ? 'active' : '' ?>" href="http://bankas_2.lt/new_iban">Pridėti naują sąskaitą</a>
                <form action="" method="post">
                    <button type="submit" class="btn btn-success">Log Out</button>
                </form>
            </div>
        </div>
    </nav>
    
</body>