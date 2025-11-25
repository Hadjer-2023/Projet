<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="/projet/public/css/main.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->e($title) ?></title>
</head>

<body>

    <!-- NAVBAR MODERNE -->
    <header class="navbar">
        <div class="logo">Genshin DB</div>

        <div class="nav-links">
            <a href="/projet/?action=index">Accueil</a>
            <a href="/projet/?action=add-perso">Ajouter un personnage</a>
            <a href="/projet/?action=add-perso-element">Ajouter par élément</a>
            <a href="/projet/?action=logs">Logs</a>
            <a href="/projet/?action=login">Connexion</a>
        </div>
    </header>

    <!-- CONTENU PRINCIPAL -->
    <main id="contenu">
        <?= $this->section('content') ?>
    </main>

</body>
</html>
