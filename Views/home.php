
<!-- Menu de navigation -->
<nav>
    <a href="/projet/?action=index">Accueil</a>
    <a href="/projet/?action=add-perso">Ajouter un personnage</a>
    <a href="/projet/?action=add-perso-element">Ajouter par élément</a>
    <a href="/projet/?action=logs">Logs</a>
    <a href="/projet/?action=login">Connexion</a>
</nav>

<h1>Collection <?= $this->e($gameName) ?></h1>

<?php if (!empty($personnages)): ?>
    <?php foreach($personnages as $p): ?>
        <div class="personnage">
            <h3><?= $this->e($p['name']) ?></h3>
            <p>Élément: <?= $this->e($p['element']) ?></p>
            <p>Classe: <?= $this->e($p['unitclass']) ?></p>
            <p>Origine: <?= $this->e($p['origin']) ?></p>
            <p>Rareté: <?= $this->e($p['rarity']) ?></p>

            <!-- Image -->
            <?php if(!empty($p['url_img'])): ?>
                <img src="/projet/public/img/<?= $this->e($p['url_img']) ?>" 
                     alt="<?= $this->e($p['name']) ?>" width="100">
            <?php else: ?>
                <p>Aucune image disponible</p>
            <?php endif; ?>

            <!-- Options pour modifier / supprimer -->
            <div class="options">
                <a href="/projet/?action=edit-perso&id=<?= $this->e($p['id']) ?>">Modifier</a>
                <a href="/projet/?action=del-perso&id=<?= $this->e($p['id']) ?>">Supprimer</a>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun personnage trouvé.</p>
<?php endif; ?>
