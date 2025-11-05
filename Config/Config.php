<?php
namespace Config;

use Exception;

class Config {
    private static $param;

    public static function get($nom, $valeurParDefaut = null) {
        if (isset(self::getParameter()[$nom])) {
            $valeur = self::getParameter()[$nom];
        } else {
            $valeur = $valeurParDefaut;
        }
        return $valeur;
    }

    private static function getParameter() {
        if (self::$param == null) {
            $cheminFichier = __DIR__ . '/dev.ini';
            if (!file_exists($cheminFichier)) {
                throw new Exception("Fichier de configuration introuvable");
            } else {
                self::$param = parse_ini_file($cheminFichier);
            }
        }
        return self::$param;
    }
}
