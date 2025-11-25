
<h1>Ajouter un attribut / élément</h1>

<form action="index.php?action=add-perso-element" method="POST">

    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required>

    <br><br>

    <label for="image">Image (URL) :</label>
    <input type="text" id="image" name="image" required>

    <br><br>

    <label for="type">Type :</label>
    <select id="type" name="type">
        <option value="element">Élément</option>
        <option value="unitclass">Classe</option>
        <option value="origin">Origine</option>
    </select>

    <br><br>

    <button type="submit">Ajouter</button>
</form>
