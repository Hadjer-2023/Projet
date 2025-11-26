<?php
namespace Models;

class UnitclassDAO extends BasePDODAO {

    public function getAll(): array {
        $sql = "SELECT * FROM element";
        return $this->execRequest($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?array {
        $sql = "SELECT * FROM element WHERE id = ?";
        $res = $this->execRequest($sql, [$id])->fetch(\PDO::FETCH_ASSOC);
        return $res ?: null;
    }

    public function insert(string $name, string $url_img): void {
        $sql = "INSERT INTO element (name, url_img) VALUES (?, ?)";
        $this->execRequest($sql, [$name, $url_img]);
    }
}
