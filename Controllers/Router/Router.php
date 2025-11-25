<?php
namespace Controllers\Router;

class Router {
    private array $routes = [];

    // Ajouter une route : clé = action
    public function add(string $actionName, callable $callback): void {
        $this->routes[$actionName] = $callback;
    }

    // Exécuter la bonne action
    public function run(): void {
        // On récupère le paramètre action de l'URL, sinon 'index'
        $action = $_GET['action'] ?? 'index';

        if (isset($this->routes[$action])) {
            call_user_func($this->routes[$action]);
        } else {
            echo "Erreur 404 : page introuvable pour l'action '$action'";
        }
    }
}
