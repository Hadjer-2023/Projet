<?php
namespace Controllers;

use League\Plates\Engine;
use Models\PersonnageDAO;

class MainController {
    private Engine $templates;
    private PersonnageDAO $dao;

    // 🔐 Identifiants admin simples pour le TP
    private string $adminEmail = "admin@test.com";
    private string $adminPassword = "1234";

    public function __construct(Engine $templates) {
        $this->templates = $templates;
        $this->dao = new PersonnageDAO();
    }

    // PAGE D’ACCUEIL
    public function index(?string $message = null): void {
        $personnages = $this->dao->getAll();

        echo $this->templates->render('home', [
            'gameName' => 'Genshin Impact',
            'personnages' => $personnages,
            'message' => $message
        ]);
    }

    // AJOUTER UN PERSONNAGE
    public function addPerso(): void {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'] ?? '';
            $element = $_POST['element'] ?? '';
            $unitclass = $_POST['unitclass'] ?? '';
            $origin = $_POST['origin'] ?? '';
            $rarity = $_POST['rarity'] ?? '';

            if (empty($name) || empty($element) || empty($unitclass) || empty($origin) || empty($rarity)) {
                echo $this->templates->render('add-perso', [
                    'title' => 'Ajouter un personnage',
                    'message' => 'Veuillez remplir tous les champs.'
                ]);
                return;
            }

            $this->dao->insert($name, $element, $unitclass, $origin, $rarity);

            $this->index("Personnage ajouté avec succès !");
            return;
        }

        echo $this->templates->render('add-perso', [
            'title' => 'Ajouter un personnage'
        ]);
    }

    // AJOUT PAR ELEMENT
    public function addPersoByElement(): void {
        echo $this->templates->render('add-element', [
            'title' => 'Ajouter par élément'
        ]);
    }

    // 🔐 LOGIN
    public function login(): void {

        if (!empty($_SESSION["user"])) {
            header("Location: /projet/?action=index");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($email === $this->adminEmail && $password === $this->adminPassword) {

                $_SESSION["user"] = $email;

                header("Location: /projet/?action=index");
                exit;
            }

            echo $this->templates->render("login", [
                "title" => "Connexion",
                "message" => "Identifiants incorrects."
            ]);
            return;
        }

        echo $this->templates->render('login', [
            'title' => 'Connexion'
        ]);
    }

    // 🔴 LOGOUT
    public function logout(): void {
        session_destroy();
        header("Location: /projet/?action=login");
        exit;
    }

    // MODIFIER UN PERSONNAGE
    public function updatePerso(?string $id): void {

        if (!$id) {
            $this->index("Erreur : ID manquant");
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'] ?? '';
            $element = $_POST['element'] ?? '';
            $unitclass = $_POST['unitclass'] ?? '';
            $origin = $_POST['origin'] ?? '';
            $rarity = $_POST['rarity'] ?? '';

            $this->dao->update($id, $name, $element, $unitclass, $origin, $rarity);

            $this->index("Personnage modifié !");
            return;
        }

        $personnage = $this->dao->getByID($id);

        echo $this->templates->render('update-perso', [
            'title' => 'Modifier personnage',
            'personnage' => $personnage
        ]);
    }

    // SUPPRIMER
    public function deletePerso(?string $id): void {

        if (!$id) {
            $this->index("Erreur : ID manquant pour suppression.");
            return;
        }

        $this->dao->delete($id);

        $this->index("Personnage supprimé !");
    }

    // 📄 PAGE DES LOGS
    public function logs(): void {
        echo $this->templates->render('logs', [
            'title' => 'Logs'
        ]);
    }
}
