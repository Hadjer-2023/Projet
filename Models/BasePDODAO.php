<?php
namespace Models;

use Config\Config;
use PDO;
use PDOException;

class BasePDODAO {
    protected static $db;

    public function __construct() {
        if (self::$db === null) {
            $this->connect();
        }
    }

    private function connect() {
        try {
            $dsn = Config::get('dsn');
            $user = Config::get('user');
            $pass = Config::get('pass');

            self::$db = new PDO($dsn, $user, $pass);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base : " . $e->getMessage());
        }
    }

    protected function getDb() {
        return self::$db;
    }

    // ✅ Nouvelle méthode pour exécuter les requêtes SQL
    protected function execRequest(string $sql, array $params = []): \PDOStatement
    {
        $stmt = $this->getDb()->prepare($sql); // prépare la requête
        $stmt->execute($params);               // exécute avec les paramètres
        return $stmt;                          // renvoie le résultat PDOStatement
    }
}
