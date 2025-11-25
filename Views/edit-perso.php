<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier personnage</title>
</head>
<body>

<h1>Modifier le personnage</h1>

<form method="post" action="/projet/?action=edit-perso&id=<?= $personnage['id'] ?>">
    <label>Nom : <input type="text" name="name" value="<?= $personnage['name'] ?>"></label><br>
    <label>Élément : <input type="text" name="element" value="<?= $personnage['element'] ?>"></label><br>
    <label>Classe : <input type="text" name="unitclass" value="<?= $personnage['unitclass'] ?>"></label><br>
    <label>Origine : <input type="text" name="origin" value="<?= $personnage['origin'] ?>"></label><br>
    <label>Rareté : <input type="number" name="rarity" value="<?= $personnage['rarity'] ?>"></label><br>
    <button type="submit">Enregistrer</button>
</form>

</body>
</html>
