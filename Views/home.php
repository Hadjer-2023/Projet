<?php $this->layout('template', ['title' => 'TP Mihoyo']); ?>

<h1>Collection <?= $this->e($gameName) ?></h1>

<?php if (!empty($personnages)): ?>
    <?php foreach($personnages as $p): ?>
        <div class="personnage">
            <h3><?= $this->e($p['name']) ?></h3>
            <p>Élément: <?= $this->e($p['element']) ?></p>
            <p>Classe: <?= $this->e($p['unitclass']) ?></p>
            <p>Origine: <?= $this->e($p['origin']) ?></p>
            <p>Rareté: <?= $this->e($p['rarity']) ?></p>
            
            <!-- Image corrigée -->
            <img src="./public/img/<?= $this->e($p['url_img']) ?>" alt="<?= $this->e($p['name']) ?>" width="100">
            
            <!-- Options pour modifier/supprimer -->
            <div class="options">
                <a href="#">Modifier</a>
                <a href="#">Supprimer</a>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun personnage trouvé.</p>
<?php endif; ?>
