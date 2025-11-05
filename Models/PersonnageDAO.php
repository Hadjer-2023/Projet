<?php
namespace Models;

class PersonnageDAO extends BasePDODAO {

    // Récupère tous les personnages
    public function getAll(): array {
        $sql = "SELECT * FROM personnage";
        return $this->execRequest($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Récupère un personnage par ID
    public function getByID(string $id): ?array {
        $sql = "SELECT * FROM personnage WHERE id = ?";
        $res = $this->execRequest($sql, [$id])->fetch(\PDO::FETCH_ASSOC);
        return $res ?: null;
    }
}
