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

    // Ajoute un nouveau personnage  ✅ CORRIGÉ
    public function insert(string $name, string $element, string $unitclass, string $origin, int $rarity): void {
        // 1) Générer un ID unique car ta table a une clé primaire 'id'
        $id = uniqid();

        // 2) Insérer aussi l’ID dans la base
        $sql = "INSERT INTO personnage (id, name, element, unitclass, origin, rarity)
                VALUES (?, ?, ?, ?, ?, ?)";

        // 3) Exécuter la requête
        $this->execRequest($sql, [$id, $name, $element, $unitclass, $origin, $rarity]);
    }

    // Met à jour un personnage
    public function update(string $id, string $name, string $element, string $unitclass, string $origin, string $rarity): void {
        $sql = "UPDATE personnage 
                SET name = ?, element = ?, unitclass = ?, origin = ?, rarity = ? 
                WHERE id = ?";
        $this->execRequest($sql, [$name, $element, $unitclass, $origin, $rarity, $id]);
    }

    // Supprime un personnage
    public function delete(string $id): void {
        $sql = "DELETE FROM personnage WHERE id = ?";
        $this->execRequest($sql, [$id]);
    }
}
