<?php
namespace Controllers\Router;

class Router {
    private array $routes = [];

    // Accepter n’importe quel type de callback (tableau, fonction, closure...)
    public function add(string $actionName, $callback): void {
        $this->routes[$actionName] = $callback;
    }

    public function run(): void {
        $action = $_GET['action'] ?? 'index';

        if (isset($this->routes[$action])) {
            call_user_func($this->routes[$action]);
        } else {
            echo "Erreur 404 : page introuvable pour l'action '$action'";
        }
    }
}
