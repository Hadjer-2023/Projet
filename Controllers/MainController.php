<?php
namespace Controllers;

use League\Plates\Engine;
use Models\PersonnageDAO;

class MainController {
    private Engine $templates;
    private PersonnageDAO $dao;

    public function __construct(Engine $templates) {
        $this->templates = $templates;
        $this->dao = new PersonnageDAO();
    }

    // PAGE D’ACCUEIL (avec message optionnel)
    public function index(?string $message = null): void {
        $personnages = $this->dao->getAll();

        echo $this->templates->render('home', [
            'gameName' => 'Genshin Impact',
            'personnages' => $personnages,
            'message' => $message
        ]);
    }

    // AJOUTER UN PERSONNAGE (CREATE)
    public function addPerso(): void {

        // POST = on enregistre
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'] ?? '';
            $element = $_POST['element'] ?? '';
            $unitclass = $_POST['unitclass'] ?? '';
            $origin = $_POST['origin'] ?? '';
            $rarity = $_POST['rarity'] ?? '';

            // Vérification simple
            if (empty($name) || empty($element) || empty($unitclass) || empty($origin) || empty($rarity)) {
                echo $this->templates->render('add-perso', [
                    'title' => 'Ajouter un personnage',
                    'message' => 'Veuillez remplir tous les champs.'
                ]);
                return;
            }

            // INSERT
            $this->dao->insert($name, $element, $unitclass, $origin, $rarity);

            // MESSAGE DE SUCCÈS
            $this->index("Personnage ajouté avec succès !");
            return;
        }

        // GET = afficher formulaire
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

    // LOGS
    public function logs(): void {
        echo $this->templates->render('logs', [
            'title' => 'Logs'
        ]);
    }

    // LOGIN
    public function login(): void {
        echo $this->templates->render('login', [
            'title' => 'Connexion'
        ]);
    }

    // MODIFIER UN PERSONNAGE (UPDATE)
    public function updatePerso(?string $id): void {

        if (!$id) {
            $this->index("Erreur : ID manquant");
            return;
        }

        // POST = traitement update
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

        // GET = afficher formulaire pré-rempli
        $personnage = $this->dao->getByID($id);

        echo $this->templates->render('update-perso', [
            'title' => 'Modifier personnage',
            'personnage' => $personnage
        ]);
    }

    // SUPPRIMER UN PERSONNAGE (DELETE)
    public function deletePerso(?string $id): void {

        if (!$id) {
            $this->index("Erreur : ID manquant pour suppression.");
            return;
        }

        $this->dao->delete($id);

        $this->index("Personnage supprimé !");
    }
}
