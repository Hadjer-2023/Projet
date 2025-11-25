

<h1><?= $this->e($title) ?></h1>

<form method="POST" action="/projet/?action=edit-perso&id=<?= $this->e($personnage['id']) ?>">
    <label>Nom : <input type="text" name="name" value="<?= $this->e($personnage['name']) ?>"></label><br>
    <label>Élément : <input type="text" name="element" value="<?= $this->e($personnage['element']) ?>"></label><br>
    <label>Classe : <input type="text" name="unitclass" value="<?= $this->e($personnage['unitclass']) ?>"></label><br>
    <label>Origine : <input type="text" name="origin" value="<?= $this->e($personnage['origin']) ?>"></label><br>
    <label>Rareté : <input type="number" name="rarity" value="<?= $this->e($personnage['rarity']) ?>"></label><br>
    <button type="submit">Modifier</button>
</form>
