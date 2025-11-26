<?php
session_start(); // ✅ OBLIGATOIRE pour login/logout

require_once __DIR__ . '/vendor/autoload.php';

use League\Plates\Engine;
use Controllers\MainController;
use Controllers\Router\Router;

// Initialisation du moteur de template
$templates = new Engine(__DIR__ . '/Views');

// Création du contrôleur
$controller = new MainController($templates);

// Création du routeur
$router = new Router();

// Définition des routes
$router->add('index', [$controller, 'index']);
$router->add('add-perso', [$controller, 'addPerso']);
$router->add('add-perso-element', [$controller, 'addPersoByElement']);
$router->add('logs', [$controller, 'logs']);
$router->add('login', [$controller, 'login']);
$router->add('edit-perso', fn() => $controller->updatePerso($_GET['id'] ?? null));
$router->add('del-perso', fn() => $controller->deletePerso($_GET['id'] ?? null));

// ✅ nouvelle route LOGOUT
$router->add('logout', function () {
    session_destroy();
    header("Location: /projet/?action=login");
    exit;
});

// Exécution du routeur AVEC affichage des vraies erreurs
try {
    $router->run();
} catch (Exception $e) {
    echo "<pre style='background:#222;color:#0f0;padding:20px;font-size:16px;'>";
    echo "🔥 ERREUR PHP DÉTECTÉE :\n\n";
    var_dump($e);
    echo "</pre>";
    die();
}
