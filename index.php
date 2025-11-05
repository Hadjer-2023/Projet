<?php
require_once __DIR__ . '/vendor/autoload.php';

use League\Plates\Engine;
use Controllers\MainController;

$templates = new Engine(__DIR__ . '/Views');

$controller = new MainController($templates);
$controller->index();
