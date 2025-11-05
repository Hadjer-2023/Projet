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

    public function index(): void {
        $personnages = $this->dao->getAll();
        echo $this->templates->render('home', [
            'gameName' => 'Genshin Impact',
            'personnages' => $personnages
        ]);
    }
}
