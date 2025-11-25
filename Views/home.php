<?php $this->layout('template', ['title' => 'Accueil']); ?>

<h1>Collection <?= $this->e($gameName) ?></h1>

<?php foreach ($personnages as $p): ?>
    <div class="personnage">
        <img src="/projet/public/img/<?= $p['url_img'] ?>" alt="<?= $p['name'] ?>">
        <h3><?= $p['name'] ?></h3>
        <p>Élément : <?= $p['element'] ?></p>
        <p>Classe : <?= $p['unitclass'] ?></p>
        <p>Origine : <?= $p['origin'] ?></p>
        <p>Rareté : <?= $p['rarity'] ?></p>

        <div class="options">
            <a href="/projet/?action=edit-perso&id=<?= $p['id'] ?>">Modifier</a>
            <a href="/projet/?action=del-perso&id=<?= $p['id'] ?>">Supprimer</a>
        </div>
    </div>
<?php endforeach; ?>
