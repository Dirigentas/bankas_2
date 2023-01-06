<body style="margin-bottom: 0">
    <body>
    <nav class="navbar navbar-expand-sm" style="background-color: deepskyblue; font-weight: bold">
        <div class="container-fluid">
            <div class="navbar-nav" style="display:flex; gap: 10%; width: 100%; justify-content:space-around">
                <a class="nav-link <?= $pageTitle == 'Sąskaitų Sąrašas' ? 'active' : '' ?> " aria-current="page" href="http://bankas_2.lt/iban_list">Sąskaitų sąrašas</a>
                <a class="nav-link <?= $pageTitle == 'Sukurti naują sąskaitą' ? 'active' : '' ?>" href="http://bankas_2.lt/new_iban">Pridėti naują sąskaitą</a>
                <form action="<?= URL ?>logout" method="post">
                    <button type="submit" class="btn btn-success">Atsijungti</button>
                </form>
            </div>
        </div>
    </nav>