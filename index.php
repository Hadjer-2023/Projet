<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/Helpers/Psr4AutoloaderClass.php';
$loader = new \Helpers\Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('Helpers', __DIR__ . '/Helpers');
$loader->addNamespace('Controllers', __DIR__ . '/Controllers');

require_once __DIR__ . '/vendor/autoload.php';
use League\Plates\Engine;
use Controllers\MainController;

// Créer l’engine Plates pour nos vues
$templates = new Engine(__DIR__ . '/Views');

// Instancier le contrôleur et afficher la vue
$controller = new MainController($templates);
$controller->index();
