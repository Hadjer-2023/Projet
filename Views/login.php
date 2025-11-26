<?php $this->layout('template', ['title' => 'Connexion']) ?>

<h1>Connexion</h1>

<?php if (!empty($message)): ?>
    <div class="message error">
        <?= $this->e($message) ?>
    </div>
<?php endif; ?>

<form method="POST" action="/projet/?action=login">

    <label>Email :</label>
    <input type="text" name="email" required>

    <br><br>

    <label>Mot de passe :</label>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">Se connecter</button>
</form>
