<?php

namespace App\Models;

use App\Database\Database;
use App\Interface\IModel;
use PDO;

/**
 * Clase padre para modelos 
 *
 * Clase para manejar los métodos comunes de los modelos
 * a declarar 
 *
 * @since 1.0.0
 *
 */
class GenericModel implements IModel
{
    public $table_name = "";
    public $query_create = "";
    public $query_insert = "";
    public $data_dummy = [];

    public function __construct() {}

    /** 
     * Busqueda de elementos por coincidencias en el nombre. 
     * 
     * Se Verifica la coincidencia y se retorna un array de elementos en caso de encontrar alguno, 
     * en caso contrario se devuelve array vacío
     * 
     * @return array
     */
    public function searchBy(string $param, $attrs = 'name'): array
    {
        $db = Database::getInstance();
        $stmt = $db->getConnection()->prepare("SELECT $attrs FROM $this->table_name WHERE name LIKE :busqueda");
        $stmt->bindParam(':busqueda', $param, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function searchFirstBy(string $param, $attrs = 'name'): array
    {
        $db = Database::getInstance();
        $stmt = $db->getConnection()->prepare("SELECT $attrs FROM $this->table_name WHERE name LIKE :busqueda LIMIT 1");
        $stmt->bindParam(':busqueda', $param, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** 
     * Crear tabla (X) y llenar de datos. 
     * 
     * Se Verifica la existencia de la tabla y si no existe se crea y se popula con datos ya existentes en un array de data dummy
     * 
     * @return void
     */
    public function populate()
    {
        $db = Database::getInstance();
        $pdo = $db->getConnection();
        $stmt = $pdo->prepare("SHOW TABLES LIKE :table_name");

        try {
            //code...
            $stmt->bindParam(':table_name', $this->table_name);
            $stmt->execute();


            if ($stmt->rowCount() > 0) {
                echo "\033[31;1mLa tabla ($this->table_name) ya ha sido creada, no se pudo ejecutar el metodo 'populate'\033[0m\n";
                return;
            }
            $pdo->exec($this->query_create);
            $stmt = $pdo->prepare($this->query_insert);
            // Iniciar una transacción
            $pdo->beginTransaction();
            // Iterar sobre los datos y ejecutar la sentencia
            foreach ($this->data_dummy as $row) {
                $stmt->execute($row);
            }
            // Confirmar la transacción si todo salió bien
            $pdo->commit();

            echo "\033[32;1mDatos insertados correctamente en ($this->table_name).\033[0m\n";
        } catch (\Throwable $th) {
            $pdo->rollBack();
            throw $th;
        }
    }
}
