<?php

namespace App\Database;

use PDO;
use PDOException;

/**
 * Clase para manejo de base de datos
 *
 * La clase implementa patròn singleton para el manejo
 * óptimo de la base de datos, garantizando asi no tener mas
 * de una instancia de la base de datos.
 *
 * @since 1.0.0
 */
class Database
{
    private static ?Database $instance = null;
    private PDO $connectionDB;
    
    /**
     * Crea la conexion a la base de datos
     *
     * Valida los datos en el archivo .env para crear la
     * conexión de la base de datos
     *
     * @since 1.0.0
     *
     * @return type Database.
     */
    private function __construct()
    {
        try {
            $host = "mysql:host=" . ($_ENV["HOST_DB"] ?? "localhost") . ";charset=utf8;dbname=" . ($_ENV["NAME_DB"] ?? "test_alpha");
            $user = $_ENV["USER_DB"] ?? "root";
            $password = $_ENV["PASSWORD_DB"] ?? "19400202";

            $this->connectionDB = new PDO($host, $user, $password);
            $this->connectionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
    /**
     * Devolver instancia
     *
     * Devuelve la instancia de la clase validando si ya ha sido
     * creada y en caso de no ser asi crea una instancia y la retorna
     *
     * @since 1.0.0
     *
     * @return type Database.
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connectionDB;
    }
}
